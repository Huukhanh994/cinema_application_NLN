<?php


Route::group(['prefix'  =>  'admin'], function () {
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::get('register','Admin\LoginController@showRegisterForm')->name('admin.register');
    Route::post('register','Admin\LoginController@storeRegister')->name('admin.auth.store.register');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/','Admin\OrderController@dashboard')->name('admin.dashboard');
    });

    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
    Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

    Route::group(['prefix' => 'categories'], function () {
        
        Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
        Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
        Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
        Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
        Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
        Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
    });


    Route::group(['prefix' => 'attributes'], function () {
        
        Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
        Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
        Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
        Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
        Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
        Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

        // Vuejs
        Route::post('/get-values', 'Admin\AttributeValueController@getValues');
        Route::post('/add-values', 'Admin\AttributeValueController@addValues');
        Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
        Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
    });

    Route::group(['prefix'  =>   'brands'], function() {

        Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
        Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
        Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
        Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
        Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
        Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');
    
    });

    Route::group(['prefix' => 'rooms'], function () {
        
        Route::get('/','Admin\RoomController@index')->name('admin.rooms.index');
        Route::get('/create','Admin\RoomController@create')->name('admin.rooms.create');
        Route::post('/store','Admin\RoomController@store')->name('admin.rooms.store');
        Route::get('/{id}/edit','Admin\RoomController@edit')->name('admin.rooms.edit');
        Route::post('/update','Admin\RoomController@update')->name('admin.rooms.update');
        Route::get('/{id}/delete', 'Admin\RoomController@delete')->name('admin.rooms.delete');

        // VueJS
        Route::get('/seats/load/{id}','Admin\RoomAttributeController@loadSeats');
        Route::get('/rows/load/{id}','Admin\RoomAttributeController@loadRows');
    });

    Route::group(['prefix' => 'seats'], function () {
        
        Route::get('/','Admin\SeatController@index')->name('admin.seats.index');
        Route::get('/create','Admin\SeatController@create')->name('admin.seats.create');
        Route::post('/store','Admin\SeatController@store')->name('admin.seats.store');
        Route::get('/{id}/edit','Admin\SeatController@edit')->name('admin.seats.edit');
        Route::post('/update','Admin\SeatController@update')->name('admin.seats.update');
        Route::get('/{id}/delete', 'Admin\SeatController@delete')->name('admin.seats.delete');
        
    });

    Route::group(['prefix' => 'films'], function () {
        
        Route::get('/','Admin\FilmController@index')->name('admin.films.index');
        Route::get('/create','Admin\FilmController@create')->name('admin.films.create');
        Route::post('/store','Admin\FilmController@store')->name('admin.films.store');
        Route::get('/{id}/edit','Admin\FilmController@edit')->name('admin.films.edit');
        Route::post('/update','Admin\FilmController@update')->name('admin.films.update');
        Route::get('/{id}/delete', 'Admin\FilmController@delete')->name('admin.films.delete');

        Route::post('images/upload', 'Admin\FilmImageController@upload')->name('admin.films.images.upload');
        Route::get('images/{id}/delete', 'Admin\FilmImageController@delete')->name('admin.films.images.delete');

        // VueJS
        // Load attributes on the page load
        Route::get('attributes/load', 'Admin\FilmAttributeController@loadAttributes');
        // Load film attributes on the page load
        Route::post('attributes', 'Admin\FilmAttributeController@filmAttributes');
        // Load option values for a attribute
        Route::post('attributes/values', 'Admin\FilmAttributeController@loadValues');
        // Add film attribute to the current film
        Route::post('attributes/add', 'Admin\FilmAttributeController@addAttribute');
        // Delete film attribute from the current film
        Route::post('attributes/delete', 'Admin\FilmAttributeController@deleteAttribute');
    });

    Route::group(['prefix' => 'schedules'], function () {
        
        Route::get('/','Admin\SchedulesController@index')->name('admin.schedules.index');
        Route::get('/create','Admin\SchedulesController@create')->name('admin.schedules.create');
        Route::post('/store','Admin\SchedulesController@store')->name('admin.schedules.store');
        Route::get('/{id}/edit','Admin\SchedulesController@edit')->name('admin.schedules.edit');
        Route::post('/update','Admin\SchedulesController@update')->name('admin.schedules.update');
        Route::get('/{id}/delete', 'Admin\SchedulesController@delete')->name('admin.schedules.delete');
    });

    Route::group(['prefix' => 'clusters'], function () {
        Route::get('/','Admin\ClustersController@index')->name('admin.clusters.index');
        Route::get('/create','Admin\ClustersController@create')->name('admin.clusters.create');
        Route::post('/store','Admin\ClustersController@store')->name('admin.clusters.store');
        Route::get('/{id}/edit','Admin\ClustersController@edit')->name('admin.clusters.edit');
        Route::post('/update','Admin\ClustersController@update')->name('admin.clusters.update');
        Route::get('/{id}/delete', 'Admin\ClustersController@delete')->name('admin.clusters.delete');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
        Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
    });

});