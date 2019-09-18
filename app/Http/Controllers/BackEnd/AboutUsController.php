<?php

namespace App\Http\Controllers\BackEnd;

use App\AboutUs;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['view_aboutus']);
    }


    public function index(Request $request)
    {
        $rows = AboutUs::when($request->search, function ($q) use ($request) {
            return $q->where('title', 'like', '%' . $request->search . '%');
        })->paginate(10);
        if(!$rows->count() > 0)
        {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.aboutus');

        return view('aboutus.index', compact('title', 'rows'));
        
    }


    public function create()
    {
        return view('aboutus.create')->withTitle(__('custom.aboutus_create'));
        
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          =>  'required|string',
            'description'    =>  'required'
        ]);
        
        $data['short_description'] = str_limit(strip_tags($request->description), 30);
        

        AboutUs::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('aboutus.index');
    }


    public function show(AboutUs $aboutUs)
    {
        //
    }

 
    public function edit(AboutUs $aboutUs)
    {
        // dd($aboutUs);
        $row = $aboutUs;
        $title = __('custom.aboutus_update');
        return view('aboutus.edit', compact('row', 'title'));
        
    }


    public function update(Request $request, AboutUs $aboutUs)
    {
        $data = $request->validate([
            'title'          =>  'required|string',
            'description'    =>  'required'
        ]);

        $data['short_description'] = str_limit(strip_tags($request->description), 30) ;


        $aboutUs->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('aboutus.index');
    }

    
    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        return back();
    }


    public function view_aboutus()
    {
        $title = __('custom.about_us');
        $about_us = AboutUs::all();
        $recent_properties = Property::where('status', 'active')->orderBy('id', 'DESC')->take(3)->get();

        return view('aboutus.view', compact('title', 'about_us', 'recent_properties'));
    }
}
