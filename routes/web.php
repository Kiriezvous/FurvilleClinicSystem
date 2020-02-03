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


//It gets what ever path in the Controller@- so you dont need to specify or such and it should be above the route
//Route::get('/{any}', 'HomeController@index')->where('any', '.*');

//Users>
//Route::get('accounts/register', 'User\DoctorController@create');
//Route::post('register', 'RegistrationController@store');




// Website
Route::get('/home', 'PagesController@home')->name('Home'); //We could changed it somewhere where we could put the verification part that is needed in the system
Route::get('/about', 'PagesController@about')->name('About');
Route::get('/service', 'PagesController@service')->name('Service');
Route::get('/profile', 'PagesController@profile')->name('Profile');


