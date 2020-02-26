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

Auth::routes();

// Website
Route::get('/', 'PagesController@home')->name('Home');
//Collection
Route::get('home', 'PagesController@home')->name('Home'); //We could changed it somewhere where we could put the verification part that is needed in the system
Route::get('about', 'PagesController@about')->name('About');
Route::get('service', 'PagesController@service')->name('Service');
Route::get('profile', 'PagesController@profile')->name('Profile');
Route::get('online-appointment', 'PagesController@appointment')->name('Appointment');
Route::get('gallery', 'PagesController@gallery')->name('Gallery');
Route::get('shoppingcart', 'PagesController@shoppingcart')->name('ShoppingCart');
Route::get('contact', 'PagesController@contact');


