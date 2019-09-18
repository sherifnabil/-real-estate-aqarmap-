<?php

namespace App\Http\Controllers\BackEnd;

use App\City;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['viewProperties']);
    }

    public function index(Request $request)
    {
        $rows = City::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        if(!$rows->count() > 0)
        {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.cities');

        return view('cities.index', compact('title', 'rows'));

    }
    
    
    public function create()
    {
        return view('cities.create')->withTitle(__('custom.add_city'));
        
    }


    public function store(Request $request)
    {

        
        $data = $request->validate([
            'name'          =>  'required|string|max:50|unique:cities',
            'main_image'    =>  'required|image|max:2000|mimes:jpg,png,jpeg,gif'  
        ]);
        $pathName = request('main_image')->store('cities');
        // dd($path, $request->main_image );
            // dd($pathName);
        $data['main_image']  = $pathName;
        City::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('cities.index');
    }


    public function show(City $city)
    {
        //
    }

  

    public function edit(City $city)
    {
        $title = __('custom.edit') . ' ' .  __('custom.city');
        $row = $city;

        return view('cities.edit', compact('title', 'row'));
    }


    public function update(Request $request, City $city)
    {

        $data = $request->validate([
            'name'          =>  'required|string|max:50|unique:cities,name,' . $city->id,
            'main_image'    =>  'sometimes|image|max:2000|mimes:jpg,png,jpeg,gif'
        ]);
        if($request->has('main_image'))
        {
            if(Storage::exists($city->main_image)){

                Storage::delete($city->main_image);
            }
            $data['main_image'] = $request->main_image->store('cities');
        }

        $city->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('cities.index');
    }

    

    public function destroy(City $city)
    {
        // dd($city);
        if(Storage::exists($city->main_image));
        {
            Storage::delete($city->main_image);
        }
        $city->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        return back();
    }


    public function viewProperties(City $city)
    {
        $title =  __('custom.city') . ' ' . ucwords($city->name);
        $properties =  $city->properties;
        $recent_properties = Property::where('status', 'active')->orderBy('id', 'DESC')->take(3)->get();

        return view('front-end2.view', compact('title', 'properties', 'recent_properties' ));
    }
}
