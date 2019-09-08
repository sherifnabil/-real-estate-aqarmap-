<?php

namespace App;

use App\City;
use App\User;
use App\State;
use App\Category;
use App\PropertyType;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        
        'name',
        'slug',
        'lat',
        'long',
        'contact',
        'dimensionss',
        'featured',
        'floors_num',
        'rooms_num',
        'baths_num',
        'price',
        'will_be_available_on',
        'description',
        'extra_images',
        'have_garden',
        'is_price_negotiateable',
        'furniture',
        'status',
        'finish_type',
        'seller_role',
        'payment_method',
        'property_type_id',
        'category_id',
        'city_id',
        'state_id',
        'user_id',
    ];




    public function featured()
    {
        $defaultProfile = "4.png";
        // dd(defaultProfile);
        return ($this->featured !=  $defaultProfile ? asset('storage/' . $this->featured) : asset($defaultProfile));
    }


    public function extraImages()
    {

        $extra_images_array = explode('###', $this->extra_images);
        $images = [];
        foreach ($extra_images_array as  $single) {

            $images[] = asset('storage/' . $single);
        }
        // dd(defaultProfile);
        return $images;
    }


    public function price()
    {
        return $this->price . ' ' .  __('custom.eg');
    }


    public function getRouteKeyName()
    {
        return strtolower('slug');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }



    public function state()
    {
        return $this->belongsTo(State::class);
    }


    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    
}
