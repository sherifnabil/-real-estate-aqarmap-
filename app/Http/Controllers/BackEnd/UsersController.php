<?php

namespace App\Http\Controllers\BackEnd;

use App\City;
use App\User;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\AdminsMiddleware;
use App\Http\Requests\User\users\UpdateProfile;
use App\Http\Requests\Admin\Users\StoreUsersRequest;
use App\Http\Requests\Admin\Users\UpdateUsersRequest;

class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->except(['profile', 'viewProperties']);
    }

    public function temp()
    {
        // return view('front-end.index');
        // return view('front-end2.layouts.content');
        return view('front-end2.view');
    }


    public function dashboard()
    {
        $title = __('custom.dashboard');
        return view('admins.index', compact('title'));
    }
 
    public function index(Request $request)
    {
     
        $rows = User::where('user_type', 'user')->when($request->search, function ($q) use ($request) {
            return $q->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');
            })->paginate(10);

        // dd($rows);

        (!$rows->count() > 0) ?  session()->flash('success', __('custom.please_add_some_rows')) : '';

        $title = __('custom.users');

        return view('users.index', compact('title', 'rows'));


    }

    public function admins(Request $request)
    {

        $rows = User::where('user_type', 'admin')->when($request->search, function ($q) use ($request) {
            return $q->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');
        })->paginate(10);

        (!$rows->count() > 0) ?  session()->flash('success', __('custom.please_add_some_rows')) : '';
        
        $title = __('custom.admins');

        return view('users.admins', compact('title', 'rows'));
    }


    public function create()
    {
        $userTypes = ['user', 'admin'];
        $states = State::all();
        $cities = City::all();
        $title = __('custom.add_user');
        return view('users.create', compact('states', 'cities', 'title', 'userTypes'));
    }

    public function ajaxStates($id)
    {
        if (request()->ajax()) {
            $states = State::where('city_id', $id)->get();
        }
           return view('users.states-select', compact('states'));
    }


    public function store(StoreUsersRequest $request)
    {
        
        $credentials = $request->validated();

        $credentials['profile_image'] = request('profile_image')->store('users');
        $credentials['password'] = bcrypt(request('password'));

        User::create($credentials);

        session()->flash('success', __('custom.created_successfully'));
        
        if($request->user_type == 'user'){

            return redirect()->route('users.index');

        }else{

            return redirect()->route('admins');

        }

    }


    
    public function show(User $user)
    {
        //
    }


    
    public function edit(User $user)
    {
        $row = $user;
        $userTypes = ['user', 'admin'];
        $states = State::all();
        $cities = City::all();
        $title = __('custom.update_user');
        return view('users.edit', compact('states', 'cities', 'title', 'userTypes', 'row'));
    }


    
    public function update(UpdateUsersRequest $request, User $user)
    {
        $credentials = $request->validated();
        //  $request->except(['password', 'password_confirmation', 'profile_image']);

        if(!empty($request->password)){
            $credentials['password'] = bcrypt($request->password);
         }else{
             unset($credentials['password']);
         }


        if (request()->has('profile_image')) {
            if (Storage::exists($user->profile_image)) {

                Storage::delete($user->profile_image);
            }
            $credentials['profile_image'] = $request->profile_image->store('users');
        }

        $user->update($credentials);
        session()->flash('success', __('custom.updated_successfully'));

        if ($request->user_type == 'user') {

            return redirect()->route('users.index');
        } else {
            return redirect()->route('admins');
        }
    }


    
    public function destroy(User $user)
    {
        if (Storage::exists($user->profile_image)); {
            Storage::delete($user->profile_image);
        }
        $user->delete();
        session()->flash('success', __('custom.deleted_successfully'));
        return back();
    }


    public function profile(User $user)
    {
        $title = $user->fullName() . ' ' .  __('custom.profile');
        $properties = $user->activeProperties;
        // $properties = $user->properties;
        $recent_properties = $user->latestActiveProperties;

        $pending_properties    =   $user->pendingProperties;
        return view('front-end.users.profile', compact('title', 'user', 'properties', 'recent_properties', 'pending_properties'));

    }

    public function edit_profile(User $user)
    {

        $this->authorize('update', $user);

        $row = $user;
        $states = State::all();
        $cities = City::all();
        $title = __('custom.update_user');

        return view('front-end.users.edit_profile', compact('title', 'row', 'cities', 'states'));
    }


    public function update_profile(User $user, UpdateProfile $request)
    {
        $this->authorize('update', $user);

        $credentials = $request->validated();

        if (!empty($request->password)) {
            $credentials['password'] = bcrypt($request->password);
        } else {
            unset($credentials['password']);
        }


        if (request()->has('profile_image')) {
            if (Storage::exists($user->profile_image)) {

                Storage::delete($user->profile_image);
            }
            $credentials['profile_image'] = $request->profile_image->store('users');
        }

        $user->update($credentials);

        return redirect()->route('users.profile', $user);
       
    }
}
