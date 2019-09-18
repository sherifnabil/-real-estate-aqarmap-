<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['viewProperties']);
    }


    public function index(Request $request)
    {
        $rows = Category::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.categories');

        return view('categories.index', compact('title', 'rows'));
    }

    
    public function create()
    {
        return view('categories.create')->withTitle(__('custom.create_category'));
        
    }


    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          =>  'required|string|unique:categories',
        ]);


        $data['slug'] = str_slug($data['name']);
        Category::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('categories.index');
    }


    
    public function show(Category $category)
    {
        //
    }


    
    public function edit(Category $category)
    {
        $row = $category;
        $title = __('custom.update_category');
        return view('categories.edit', compact('row', 'title'));
    }


    
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'          =>  'required|string',
        ]);

        $data['slug'] = str_slug($data['name']);

        $category->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('categories.index');
    }


    
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        return back();
    }

    public function viewProperties(Category $category)
    {
        // $category = Category::where('slug', $category)->first();
        $title = ucwords($category->name) . ' ' .  __('custom.category') ;
        $properties =  $category->properties;
        // $properties = Property::where('category_id', $category->id);
        // dd($properties);

        $recent_properties = Property::where('status', 'active')->orderBy('id', 'DESC')->take(3)->get();

        // dd($recent_properties);

        return view('front-end2.view', compact('title', 'properties', 'recent_properties'));
    }
}
