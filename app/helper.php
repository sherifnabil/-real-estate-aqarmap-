<?php

function settings()
{
    $setting = \App\Setting::orderBy('id', 'DESC')->first();
    $setting = ( $setting  != null) ? $setting : new \App\Setting()  ;
    return $setting;
}