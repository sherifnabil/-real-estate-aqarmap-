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
use App\Notifications\ActivateProperty;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StorePropertyRequest;
use App\Http\Requests\Admin\UpdatePropertyRequest;
use App\Http\Requests\User\Properties\StorePropertiesRequest;
use App\Http\Requests\User\Properties\UpdatePropertiesRequest;

class PropertiesController extends Controller
{



    public function __construct()
    {
        $this->middleware('admin')->except(['viewProperty']);
    }

    public function index(Request $request)
    {
        $rows = Property::where('status', 'active')
            ->where(function($q) use($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('contact', 'like', '%' . $request->search . '%')
                ->orWhere('dimensionss', 'like', '%' . $request->search . '%')
                ->orWhere('floors_num', 'like', '%' . $request->search . '%')
                ->orWhere('rooms_num', 'like', '%' . $request->search . '%')
                ->orWhere('baths_num', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%')
                ->orWhere('furniture', 'like', '%' . $request->search . '%')
                ->orWhere('finish_type', 'like', '%' . $request->search . '%')
                ->orWhere('payment_method', 'like', '%' . $request->search . '%');
            })->paginate(15);

        (!$rows->count() > 0) ?  session()->flash('success', __('custom.please_add_some_rows')) : '';
        
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


    public function store(StorePropertyRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        
        
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


    public function update(UpdatePropertyRequest $request, Property $property)
    {


        $data = $request->validated();


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



    public function viewProperty(Property $property)
    {

        $property = Property::where('status', 'active')->first();
        $related_properties = Property::where('status', 'active')->where('property_type_id', $property->propertyType->id)->take(3)->get();
        // dd($related_properties);
        $title = ucwords($property->name) . ' ' .  __('custom.property');

        return view('front-end2.properties.view', compact('title', 'property', 'related_properties'));
        
    }


    public function add_property()
    {
        $title = __('custom.add_property');
        $cities = City::all();
        $states = State::all();
        $property_types = PropertyType::all();
        $categories = Category::all();

        
        $payment_methods    =  $this->paymentMethods();
        $seller_roles       = $this->sellerRoles();
        $finish_types       = $this->finishTypes();
        $status             = $this->statusTypes();
        $furnish            = $this->furnishTypes();
        $booleans           = [__('custom.no'),  __('custom.yes')];


        return view('front-end2.properties.create', compact(
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
            'booleans'
        ));
    }


    public function store_property(StorePropertiesRequest $request)
    {
        $data = $request->validated();
        
        $data['featured'] = request('featured')->store('properties');
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'pending';
        
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
        $data['slug'] = str_slug($request->name) . '-' . auth()->user()->email . '-'  .$uniqueSlug;

        $l = Property::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('properties.view', $l); 

    }


    public function edit_property(Property $property)
    {
        
        $this->authorize('update', $property);

        $title = __('custom.update_property');
        $cities = City::all();
        $states = State::all();
        $property_types = PropertyType::all();
        $categories = Category::all();


        $payment_methods    = $this->paymentMethods();
        $seller_roles       = $this->sellerRoles();
        $finish_types       = $this->finishTypes();
        $furnish            = $this->furnishTypes();
        $booleans           = [__('custom.no'),  __('custom.yes')];

        $row = $property;

        return view('front-end2.properties.edit', compact(
            'title',
            'cities',
            'states',
            'property_types',
            'categories',
            'payment_methods',
            'seller_roles',
            'finish_types',
            'furnish',
            'booleans',
            'row'
        ));
    }

    public function update_property(UpdatePropertiesRequest $request, Property $property)
    {
        $this->authorize('update', $property);
        
        $data = $request->validated();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->featured) {

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
                if (Storage::exists($value)) {

                    Storage::delete($value);
                }
            } //end if

            $data['extra_images'] = implode('###', $other_images);
        } //end if

        $user = auth()->user(); 
        $uniqueSlug =  array_random(str_split($data['name']));
        $data['slug'] = str_slug($request->name) . '-' . auth()->user()->email . '-'  . $uniqueSlug;

        $property->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('properties.view', $property);
    }




    public function activateProperty(Property $property)
    {
        $property->status = 'active';
        $user = User::where('id', $property->user_id)->first();

        $user->notify(new ActivateProperty($property, $user));
        
        session()->flash('success', __('updated_successfully'));
        return redirect()->route('properties.index');

    }

}
