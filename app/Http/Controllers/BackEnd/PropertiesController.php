<?php

namespace App\Http\Controllers\BackEnd;

use App\City;
use App\User;
use App\State;
use App\Category;
use App\Property;
use App\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PropertiesController extends Controller
{

    public function index(Request $request)
    {
        $rows = Property::where('name', 'like', '%' . $request->search . '%')
                            ->where('status', 'active')->paginate(15);
        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.properties');

        return view('properties.index', compact('title', 'rows'));
    }


    public function create()
    {
        $title = __('custom.add_property');
        $cities = City::all();
        $states = State::all();
        $property_types = PropertyType::all();
        $categories = Category::all();
        $users = User::all();


        $payment_methods    =  $this->paymentMethods();
        $seller_roles       = $this->sellerRoles();
        $finish_types       = $this->finishTypes();
        $status             = $this->statusTypes();
        $furnish            = $this->furnishTypes();
        $booleans           = [__('custom.no'),  __('custom.yes')];


        return view('properties.create', compact(
            'title',
            'users', 
            'cities', 
            'states', 
            'property_types', 
            'categories', 
            'payment_methods', 
            'seller_roles', 
            'finish_types', 
            'status', 
            'furnish', 
            'booleans'
        ));
       
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate($this->storeValidatioArray());
        
        
        $data['featured'] = request('featured')->store('properties');
        
        $other_images = [];
        if($request->extra_images)
        {
            foreach ($request->extra_images as $img) {
                $other_images[] = $img->store('properties');
            }
            
        }
        
        $data['extra_images'] = implode('###', $other_images);
        
        $user = User::where('id', $request->user_id)->first();
        $uniqueSlug =  array_random(str_split($data['name']));
        $data['slug'] = str_slug($request->name) . '-' . $user->email . '-'  .$uniqueSlug;

        Property::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('properties.index');


    }


    public function show(Property $property)
    {
        //
    }

 
    public function edit(Property $property)
    {
        $title = __('custom.update_property');
        $cities = City::all();
        $states = State::all();
        $property_types = PropertyType::all();
        $categories = Category::all();
        $users = User::all();


        $payment_methods    = $this->paymentMethods();
        $seller_roles       = $this->sellerRoles();
        $finish_types       = $this->finishTypes();
        $status             = $this->statusTypes();
        $furnish            = $this->furnishTypes();
        $booleans           = [__('custom.no'),  __('custom.yes')];

        $row = $property;

        return view('properties.edit', compact(
            'title',
            'cities',
            'states',
            'property_types',
            'categories',
            'payment_methods',
            'seller_roles',
            'finish_types',
            'status',
            'furnish',
            'booleans',
            'users',
            'row'
        ));
    }


    public function update(Request $request, Property $property)
    {

        $originalValiodationArr = $this->storeValidatioArray();

        $originalValiodationArr['featured'] = 'sometimes|nullable|image';


        $data = $request->validate($originalValiodationArr);


        if($request->featured){

            if (Storage::exists($property->featured)) {

                Storage::delete($property->featured);
            } //end if

            $data['featured'] = request('featured')->store('properties');
        } //end if

        $other_images = [];

        
        if (!empty($request->extra_images)) {

            foreach ($request->extra_images as $img) {

                
                $other_images[] = $img->store('properties');
            } //end foreach

            foreach ($property->extraImages() as $value) {
                # code...
                if (Storage::exists($value)) {
                    
                    Storage::delete($value);
                }
            } //end if

            $data['extra_images'] = implode('###', $other_images);
        } //end if

        $user = User::where('id', $request->user_id)->first();
        $uniqueSlug =  array_random(str_split($data['name']));
        $data['slug'] = str_slug($request->name) . '-' . $user->email . '-'  .$uniqueSlug;
        
        $property->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('properties.index');


    }


    public function destroy(Property $property)
    {
        //
    }


    protected function paymentMethods()
    {
        return [
            'cach'   =>  __('custom.cach'),
            'check'  =>  __('custom.check')
        ];
    }

    protected function sellerRoles()
    {
        return  [
            'owner'    =>  __('custom.owner'),
            'agent'    =>  __('custom.agent')
        ];
    }


    protected function finishTypes()
    {
        return [
            'unfinished'        =>  __('custom.unfinished'),
            'semi_finished'     =>  __('custom.semi_finished'),
            'lux'               =>  __('custom.lux'),
            'super_lux'         =>  __('custom.super_lux'),
            'Extra_super_lux'   =>  __('custom.Extra_super_lux')
        ];
    }

    protected function statusTypes()
    {
        return [
            'pending'   =>    __('custom.pending'),
            'active'    =>    __('custom.active'),
            'refused'   =>    __('custom.refused'),
        ];
    }

    protected function furnishTypes()
    {
        return [
            'furnished'    =>  __('custom.furnished'),
            'unfurnished'  =>  __('custom.unfurnished'),
        ];
    }


    protected function storeValidatioArray()
    {
        return [

            'name'                      =>          'required|string',
            // 'slug'                      =>          'required|string',
            'lat'                       =>          'required|string', ///
            'long'                      =>          'required|string', ///
            'contact'                   =>          'required|numeric',
            'dimensionss'               =>          'required|numeric',
            'featured'                  =>          'required|image',
            'floors_num'                =>          'required|numeric',
            'rooms_num'                 =>          'required|numeric',
            'baths_num'                 =>          'required|numeric',
            'price'                     =>          'required|numeric',
            'will_be_available_on'      =>          'required|string', ///
            'description'               =>          'required|string', ///
            'extra_images.*'            =>          'sometimes|nullable|image',
            'have_garden'               =>          'required|boolean',
            'is_price_negotiateable'    =>          'required|boolean',
            'furniture'                 =>          'required|in:furnished,unfurnished',
            'status'                    =>          'required|in:pending,active,refused', ///
            'finish_type'               =>          'required|in:unfinished,semi_finished,lux,Extra_super_lux',
            'seller_role'               =>          'required|in:owner,agent',
            'payment_method'            =>          'required|in:cach,check',
            'property_type_id'          =>          'required|numeric',
            'category_id'               =>          'required|numeric',
            'city_id'                   =>          'required|numeric',
            'state_id'                  =>          'required|numeric',
            'user_id'                   =>          'required|numeric',
        ];
    }


    public function pending(Request $request)
    {
        $rows = Property::where('name', 'like', '%' . $request->search . '%')
            ->where('status', 'pending')->paginate(15);
        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.pending_properties');

        return view('properties.index', compact('title', 'rows'));
    }

        public function refused(Request $request)
    {
        $rows = Property::where('name', 'like', '%' . $request->search . '%')
            ->where('status', 'refused')->paginate(15);
        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.refused_properties');

        return view('properties.index', compact('title', 'rows'));
    }



}
