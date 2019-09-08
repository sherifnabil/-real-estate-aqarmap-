<?php

namespace App\Http\Controllers\BackEnd;

use App\City;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StatesController extends Controller
{
 

    public function index(Request $request)
    {
        $rows = State::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        if(!$rows->count() > 0)
        {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.states');

        return view('states.index', compact('title', 'rows'));

    }

  
    
    public function create()
    {
        $cities = City::all();
        $title = __('custom.add_state');
        return view('states.create', compact('title', 'cities'));
        
    }

  
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          =>  'required|string|max:50|unique:states',
            'main_image'    =>  'required|image|max:2000|mimes:jpg,png,jpeg,gif',
            'city_id'       =>  'required|numeric',
        ]);

        $data['main_image'] = request('main_image')->store('states');

        
        State::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('states.index');
    }


    
    public function show(State $state)
    {
        //
    }


    
    public function edit(State $state)
    {
        $title = __('custom.edit') . ' ' .  __('custom.state');
        $row = $state;
        $cities = City::all();


        return view('states.edit', compact('title', 'row', 'cities'));
    }


    
    public function update(Request $request, State $state)
    {
        $data = $request->validate([
            'name'          =>  'required|string|max:50|unique:states,name,' . $state->id,
            'main_image'    =>  'sometimes|image|max:2000|mimes:jpg,png,jpeg,gif',
            'city_id'       =>  'required|numeric',
        ]);

        if ($request->has('main_image')) {
            if (Storage::exists($state->main_image)) {

                Storage::delete($state->main_image);
            }
            $data['main_image'] = $request->main_image->store('states');
        }

        $state->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('states.index');
    }

    

    public function destroy(State $state)
    {
        if (Storage::exists($state->main_image)); {
            Storage::delete($state->main_image);
        }

        $state->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        
        return back();
    }
}
