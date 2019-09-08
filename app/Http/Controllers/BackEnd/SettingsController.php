<?php

namespace App\Http\Controllers\BackEnd;

use App\City;
use App\State;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    
    public function index(Request $request)
    {
        $rows = Setting::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.settings');

        return view('settings.index', compact('title', 'rows'));
    }

  
    public function create()
    {

        $title = __('custom.add_settings');
        $cities = City::all();
        $states = State::all();
        return view('settings.create', compact('title', 'cities', 'states'));
        
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'site_name'             =>  'required|string',
            'facebook'              =>  'sometimes|nullable|string',
            'instagram'             =>  'sometimes|nullable|string',
            'twitter'               =>  'sometimes|nullable|string',
            'our_contact_number'    =>  'sometimes|nullable|numeric',
            'address'               =>  'sometimes|nullable|string',
            'site_image'            =>  'sometimes|nullable|image',
            'city_id'               =>  'sometimes|nullable|numeric',
            'state_id'              =>  'sometimes|nullable|numeric',
            'site_description'      =>  'sometimes|nullable|string',

        ]);

        if($request->site_image){
            $data['site_image'] = request('site_image')->store('website');

        }


        Setting::create($data);
        session()->flash('success', __('custom.created_successfully'));
        return redirect()->route('settings.index');
    }

   
    public function show(Setting $setting)
    {
        //
    }

   
    public function edit(Setting $setting)
    {
        $row = $setting;
        $cities = City::all();
        $states = State::all();
        $title = __('custom.update_settings');
        return view('settings.edit', compact('row', 'title', 'cities', 'states'));
    }

   
    public function update(Request $request, Setting $setting)
    {
        $data = $request->validate([
            'site_name'             =>  'required|string',
            'facebook'              =>  'sometimes|nullable|string',
            'instagram'             =>  'sometimes|nullable|string',
            'twitter'               =>  'sometimes|nullable|string',
            'our_contact_number'    =>  'sometimes|nullable|numeric',
            'address'               =>  'sometimes|nullable|string',
            'site_image'            =>  'sometimes|nullable|image',
            'city_id'               =>  'sometimes|nullable|numeric',
            'state_id'              =>  'sometimes|nullable|numeric',
            'site_description'      =>  'sometimes|nullable|string',
        ]);


        if ($request->site_image) {
            if (Storage::exists($setting->site_image)) {

                Storage::delete($setting->site_image);
            }
            $data['site_image'] = $request->site_image->store('cities');
        }

        $setting->update($data);
        session()->flash('success', __('custom.updated_successfully'));
        return redirect()->route('settings.index');

    }

   
    public function destroy(Setting $setting)
    {
        if (Storage::exists($setting->site_image)); {
            Storage::delete($setting->site_image);
        }
        $setting->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        return back();
    }
}
