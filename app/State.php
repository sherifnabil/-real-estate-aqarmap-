<?php

namespace App;

use App\City;
use App\User;
use App\Property;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $fillable = [
        'name',
        'main_image',
        'city_id'
    ];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class)->where('status', 'active');
    }

}
