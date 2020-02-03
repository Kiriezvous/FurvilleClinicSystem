<?php

use RealRashid\SweetAlert\Facades\Alert;

//It groups the admin login and logout data for Admin then goes to /admin dashboard
Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            Alert::success('Welcome');
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

    });

});

Route::resources([
    'categories' => 'CategoriesController',
    'employees' => 'User\DoctorController',

    'products' => 'ProductsController',
    'services' => 'ServicesController',
    'animaltypes' => 'AnimalTypesController',
    'characteristics' => 'BreedCharacteristicsController',
    'dogs'=> 'DogsController',
    'cats' => 'CatsController',
    'pets' => 'PetsController',
    'events' => 'EventController',
]);

//Route::get('appointment', 'EventController@index')->name('index'); //Make it a resource array later
Route::get('appointment', 'FullCalendarController@index');
Route::get('/load-events', 'EventController@loadEvents')->name('routeloadEvents');
Route::get('walk-in', 'EventController@create');


