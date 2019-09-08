<?php

namespace App\Http\Controllers\BackEnd;

use App\City;
use App\User;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\AdminsMiddleware;

class UsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(AdminsMiddleware);
    // }

    public function temp()
    {
        return view('front-end.index');
    }


    public function dashboard()
    {
        $title = __('custom.dashboard');
        return view('admins.index', compact('title'));
    }
 
    public function index(Request $request)
    {
     
        $rows = User::where('user_type', 'user')->when($request->search, function ($q) use ($request) {
            return $q->
            where('first_name', 'like', '%' . $request->search . '%')
            ->orWhere('last_name', 'like', '%' . $request->search . '%');
        })->paginate(10);

        // dd($rows);

        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
        $title = __('custom.users');

        return view('users.index', compact('title', 'rows'));


    }

    public function admins(Request $request)
    {

        $rows = User::where('user_type', 'admin')->when($request->search, function ($q) use ($request) {
            return $q->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%');
        })->paginate(10);

        // dd($rows);
        // where('user_type', 'admin')
        //     ->where('first_name', 'like', '%' . $request->search . '%')
        //     ->orWhere('last_name', 'like', '%' . $request->search . '%')->paginate(10);

        if (!$rows->count() > 0) {
            session()->flash('success', __('custom.please_add_some_rows'));
        }
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
        // dd($id);
        if (request()->ajax()) {
            $states = State::where('city_id', $id)
            ->get();
        }
           return view('users.states-select', compact('states'));
    }


    public function store(Request $request)
    {
        $credentials = $request->validate([
            'first_name'        => ['required', 'string', 'max:50'],
            'last_name'         => ['required', 'string', 'max:50'],
            'email'             => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'phone'             => ['required', 'numeric', 'min:11'],
            'address'           => ['required', 'string', 'max:100'],
            'user_type'         => ['required', 'string'],
            'city_id'           => ['required', 'numeric'],
            'state_id'          => ['required', 'numeric'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image'     => ['required', 'image'],
        ]);

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


    
    public function update(Request $request, User $user)
    {
        $credentials = $request->validate([
            'first_name'        => 'required|string|max:50',
            'last_name'         => 'required|string|max:50',
            'email'             => 'required|string|email|max:50|unique:users,email,' . $user->id,
            'phone'             => 'required|numeric|min:11',
            'address'           => 'required|string|max:100',
            'user_type'         => 'required|string',
            'city_id'           => 'required|numeric',
            'state_id'          => 'required|numeric',
            'password'          => 'sometimes|nullable|min:8|confirmed',
            'profile_image'     => 'sometimes|image',
        ]);
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
}
