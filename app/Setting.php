<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'facebook',
        'instagram',
        'twitter',
        'our_contact_number',
        'address',
        'site_image',
        'city_id',
        'state_id',
        'site_description'
    ];

    public function fullAddress()
    {
        return !empty($this->address) ? ucwords($this->address) . ' ' . ucwords($this->state->name) . ' ' . ucwords($this->city->name) : __('custom.no_data_provided');
    }


    public function siteImage()
    {
        $defaultProfile = "4.png";

        return ($this->site_image !=  $defaultProfile ? asset('storage/' . $this->site_image) : asset($defaultProfile));
    }


    public function getsite_descriptionAttribute()
    {
        return ucfirst($this->site_description);
    }


    public function getsite_nameAttribute()
    {
        return strtoupper($this->site_name);
    }



    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
