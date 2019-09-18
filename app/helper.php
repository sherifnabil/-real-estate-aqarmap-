<?php

function settings()
{
    $setting = \App\Setting::orderBy('id', 'DESC')->first();
    $setting = ( $setting  != null) ? $setting : new \App\Setting()  ;
    return $setting;
}



function categories()
{
    $categories = \App\Category::all();
    return $categories;
}

function PropertyTypes()
{
    $propertyTypes = \App\PropertyType::all();
    return $propertyTypes;
}


