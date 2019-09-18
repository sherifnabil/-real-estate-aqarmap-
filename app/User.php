<?php

namespace App;

use App\City;
use App\State;
use App\Property;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'phone', 
        'user_type', 
        'email', 
        'password', 
        'address', 
        'city_id', 
        'state_id', 
        'profile_image'
    ];


    protected $table = 'users';

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function properties()
    {
        return $this->hasMany(Property::class);
    }


    public function activeProperties()
    {
        return $this->hasMany(Property::class)->where('status', 'active');
    }


    public function latestActiveProperties()
    {
        return $this->hasMany(Property::class)->where('status', 'active')->take(6)->latest();
    }

    public function pendingProperties()
    {
        return $this->hasMany(Property::class)->where('status', 'pending');
    }


    public function state()
    {
        return $this->belongsTo(State::class);
    }


    public function fullName()
    {
        return ucwords($this->first_name) . ' ' . ucwords($this->last_name);
    }


    public function userTypeName()
    {

        
        return ucwords($this->user_type) ;
    }


    public function profilImage()
    {
        $defaultProfile = "4.png";
        // dd(defaultProfile);
        return ($this->profile_image !=  $defaultProfile ? asset('storage/' . $this->profile_image) : asset($defaultProfile) );
    }



    public function fullAddress()
    {
        return ucwords($this->address) . ' ' . ucwords($this->state['name']) . ' ' . ucwords($this->city['name']);
    }

}
