<?php

namespace App;

use App\User;
use App\State;
use App\Property;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    protected $fillable = [
        'name',
        'main_image'
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }


    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
