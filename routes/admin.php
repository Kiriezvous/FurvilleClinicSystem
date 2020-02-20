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
    'clients' => 'User\ClientsController',
    'patients' => 'PatientController',
    'diagnosis' => 'DiagnosisController',
    'online-appointment' => 'FullCalendarController'
]);


//Route::get('appointment', 'EventController@index')->name('index'); //Make it a resource array later
Route::get('appointment', 'FullCalendarController@index');
Route::get('/load-events', 'EventController@loadEvents')->name('routeloadEvents');
Route::get('walk-in', 'EventController@create');

Route::get('Userexport', 'User\ClientsController@Userexport')->name('Userexport');
Route::post('Userimport', 'User\ClientsController@Userimport')->name('Userimport');


Route::get('Categoriesexport', 'CategoriesController@Categoriesexport')->name('Categoriesexport');
Route::post('Categoriesimport', 'CategoriesController@Categoriesimport')->name('Categoriesimport');

Route::get('Productsexport', 'ProductsController@Productsexport')->name('Productsexport');
Route::post('Productsimport', 'ProductsController@Productsimport')->name('Productsimport');

Route::get('Patientsexport', 'PatientController@Patientsexport')->name('Patientsexport');
Route::post('Patientsimport', 'PatientController@Patientsimport')->name('Patientsimport');

Route::get('Doctorsexport', 'User\DoctorController@Doctorsexport')->name('Doctorsexport');
Route::post('Doctorsimport', 'User\DoctorControlle@Doctorsimport')->name('Doctorsimport');

Route::get('Staffexport', 'User\StaffController@Staffexport')->name('Staffexport');
Route::post('Staffimport', 'User\StaffController@Staffimport')->name('Staffimport');

