<?php





Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],function () {
    
    
        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('about-us/view', 'BackEnd\AboutUsController@view_aboutus')->name('aboutus.view');

        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');
            
        Route::group(['namespace' => 'BackEnd' ], function(){

            Route::get('categories/{category}/view', 'CategoriesController@viewProperties')->name('categories.view');
            Route::get('property-types/{propertyType}/view', 'PropertyTypeController@viewProperties')->name('property-types.view');
            Route::get('properties/{property}/view', 'PropertiesController@viewProperty')->name('properties.view');
            Route::get('cities/{city}/view', 'CitiesController@viewProperties')->name('cities.view');
            Route::get('states/{state}/view', 'StatesController@viewProperties')->name('states.view');
            Route::get('users/{user}/profile', 'UsersController@profile')->name('users.profile');
            Route::get('add/property', 'PropertiesController@add_property')->name('add.property');
            Route::post('add/property', 'PropertiesController@store_property')->name('store.property');
            Route::get('edit/{property}/property', 'PropertiesController@edit_property')->name('edit.property');
            Route::post('update/{property}/property', 'PropertiesController@update_property')->name('update.property');
            Route::get('users/{user}/edit', 'UsersController@edit_profile')->name('profile.edit');
            Route::post('users/{user}/update', 'UsersController@update_profile')->name('profile.update');
            Route::get('properties/{property}/activate', 'PropertiesController@activateProperty')->name('properties.activate');
        });



    

});
