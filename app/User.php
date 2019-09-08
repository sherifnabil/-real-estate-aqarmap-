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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'user_type', 'email', 'password', 'address', 'city_id', 'state_id', 'profile_image'
    ];


    protected $table = 'users';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
