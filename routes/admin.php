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
    'doctors' => 'User\DoctorController',
    'employees' => 'User\StaffController',
    'products' => 'ProductsController',
    'services' => 'ServicesController',
    'types' => 'PetTypeController',
    'breeds' => 'BreedController',
    'events' => 'EventController',
    'diagnoses' => 'DiagnosesController',
    'clients' => 'User\ClientsController',
    'patients' => 'PatientController'
]);


//Route::get('appointment', 'EventController@index')->name('index'); //Make it a resource array later
Route::get('appointment', 'FullCalendarController@index');
Route::get('/load-events', 'EventController@loadEvents')->name('routeloadEvents');
Route::get('walk-in', 'EventController@create');

Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');


Route::get('export', 'CategoriesController@export')->name('export');
Route::post('import', 'CategoriesController@import')->name('import');

Route::get('export', 'ProductsController@export')->name('export');
Route::post('import', 'ProductsController@import')->name('import');

