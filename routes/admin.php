<?php

use RealRashid\SweetAlert\Facades\Alert;

//It groups the admin login and logout data for Admin then goes to /admin dashboard
Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard.index');;

        Route::get('Userexport', 'Admin\User\ClientsController@Userexport')->name('Userexport');
        Route::post('Userimport', 'Admin\User\ClientsController@Userimport')->name('Userimport');

        Route::get('Categoriesexport', 'Admin\CategoriesController@Categoriesexport')->name('Categoriesexport');
        Route::post('Categoriesimport', 'Admin\CategoriesController@Categoriesimport')->name('Categoriesimport');

        Route::get('Productsexport', 'Admin\ProductsController@Productsexport')->name('Productsexport');
        Route::post('Productsimport', 'Admin\ProductsController@Productsimport')->name('Productsimport');

        Route::get('Patientsexport', 'Admin\PatientController@Patientsexport')->name('Patientsexport');
        Route::post('Patientsimport', 'Admin\PatientController@Patientsimport')->name('Patientsimport');

        Route::get('Doctorsexport', 'Admin\User\DoctorController@Doctorsexport')->name('Doctorsexport');
        Route::post('Doctorsimport', 'Admin\User\DoctorController@Doctorsimport')->name('Doctorsimport');

        Route::get('Staffexport', 'Admin\User\StaffController@Staffexport')->name('Staffexport');
        Route::post('Staffimport', 'Admin\User\StaffController@Staffimport')->name('Staffimport');

        Route::resource('employees', 'Admin\User\StaffController');
        Route::resource('user', 'Admin\ProfileController');
        Route::resource('categories', 'Admin\CategoriesController');
        Route::resource('doctors', 'Admin\User\DoctorController');
        Route::resource('products', 'Admin\ProductsController');
        Route::resource('services', 'Admin\ServicesController');
        Route::resource('types', 'Admin\PetTypeController');
        Route::resource('breeds', 'Admin\BreedController');
        Route::resource('clients', 'Admin\User\ClientsController');
        Route::resource('patients', 'Admin\PatientController');
        Route::resource('diagnosis', 'Admin\DiagnosisController');
        Route::resource('records', 'Admin\RecordsController');
        Route::resource('schedule', 'Admin\EventController');
        Route::resource('orders', 'Admin\OrderController');


        Route::get('pdf', 'Admin\ReportsController@reports')->name('reports.pdf');
        Route::get('view-pdf', 'Admin\ReportsController@list_view')->name('view.muna');


        Route::get('admin-view-pdf', 'Admin\ReportsController@admin_list')->name('doctorsview');
    });


});



