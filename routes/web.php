<?php

use App\Http\Middleware\AdminsMiddleware;




Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],function () {

    Auth::routes();
    
        Route::get('temp', 'BackEnd\UsersController@temp');
        Route::get('/home', 'HomeController@index')->name('home');

            
        Route::group(['prefix' => 'admins', 'namespace' => 'BackEnd' ], function(){
            
            // Route::get('login', 'UsersController@login')->name('login');

            Route::get('dashboard', 'UsersController@dashboard')->name('admin.dashboard');

            
            Route::resource('users', 'UsersController')->except('show');
            Route::get('admins', 'UsersController@admins')->name('admins')->middleware('admin');

            // ajax get 
            Route::get('states/ajax/{id}', 'UsersController@ajaxStates')->name('ajax.states');
            
            Route::resource('categories', 'CategoriesController');
            Route::resource('settings', 'SettingsController')->except('show');
            Route::resource('aboutus', 'AboutUsController')->except('show');
            Route::resource('cities', 'CitiesController')->except('show');
            Route::resource('states', 'StatesController')->except('show');
            Route::resource('property-types', 'PropertyTypeController')->except('show');
            Route::resource('properties', 'PropertiesController')->except('show');
            Route::get('properties/pending', 'PropertiesController@pending')->name('properties.pending');
            Route::get('properties/refused', 'PropertiesController@refused')->name('properties.refused');
        });


    Route::get('/', function () {
        return view('welcome');
    });



});
