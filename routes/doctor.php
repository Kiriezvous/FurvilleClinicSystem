<?php

Route::group(['prefix'  =>  'doctor'], function () {

    Route::get('login', 'Doctor\LoginController@showLoginForm')->name('doctor.login');
    Route::post('login', 'Doctor\LoginController@login')->name('doctor.login.post');
    Route::get('logout', 'Doctor\LoginController@logout')->name('doctor.logout');

    Route::group(['middleware' => ['auth:doctor']], function () {

        Route::get('/', function () {
            return view('doctor.dashboard.index');
        })->name('doctor.dashboard');

    });

});
