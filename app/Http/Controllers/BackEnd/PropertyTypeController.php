<?php

namespace App\Http\Controllers\BackEnd;

use App\Property;
use App\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->except(['viewProperties']);
    }

    public function index(Request $request)
    {
        $rows = PropertyType::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.property_types');

        return view('property-type.index', compact('title', 'rows'));
        
    }


    
    public function create()
    {
        return view('property-type.create')->withTitle(__('custom.property_type_create'));
        
    }

    

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          =>  'required|string',
        ]);



        PropertyType::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('property-types.index');
    }


    
    public function show(PropertyType $propertyType)
    {
        //
    }

    
    public function edit(PropertyType $propertyType)
    {
        $row = $propertyType;
        $title = __('custom.property_type_update');
        return view('property-type.edit', compact('row', 'title'));
    }


    
    public function update(Request $request, PropertyType $propertyType)
    {
        $data = $request->validate([
            'name'          =>  'required|string',
        ]);

        $propertyType->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('property-types.index');
    }


    
    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        return back();
    }

    public function viewProperties(PropertyType $propertyType)
    {
        // dd($propertyType->id);
        $title =  __('custom.property_type') . ' ' . ucwords($propertyType->name)  ;
        $properties =  $propertyType->properties;

        $recent_properties = Property::where('status', 'active')->orderBy('id', 'DESC')->take(3)->get();

        return view('front-end2.view', compact('title', 'properties', 'recent_properties'));
    }
}
