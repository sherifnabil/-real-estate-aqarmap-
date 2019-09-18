<?php

namespace App;

use App\Property;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return strtolower('slug');
    }
    

    public function properties()
    {
        return $this->hasMany(Property::class)->where('status', 'active');
    }


}
