<?php

namespace App;

use App\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    
    protected $fillable = ['name'];



    public function properties()
    {
        return $this->hasMany(Property::class)->where('status', 'active');
    }
}
