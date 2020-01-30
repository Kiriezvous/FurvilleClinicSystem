<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Require routes from Admin / Doctor / Staff for Login Authentication Guard
require 'admin.php';
require 'doctor.php';
require 'staff.php';


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Users>
Route::get('users/register', 'User\DoctorController@create');
Route::post('register', 'RegistrationController@store');
