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
use Gloudemans\Shoppingcart\Facades\Cart;

require 'admin.php';
require 'doctor.php';
require 'staff.php';

Auth::routes();


Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('profile', 'PetProfileController');
Route::resource('customer', 'UserController');


// Website
Route::get('/', 'PagesController@home')->name('Home');
//Collection
Route::get('home', 'PagesController@home')->name('Home'); //We could changed it somewhere where we could put the verification part that is needed in the system
Route::get('about', 'PagesController@about')->name('About');
Route::get('service', 'PagesController@service')->name('Service');

Route::get('gallery', 'PagesController@gallery')->name('Gallery');
Route::get('contact', 'PagesController@contact');

// Shopping Cart
Route::get('shop', 'PagesController@shoppingcart')->name('ShoppingCart');
Route::get('shop/{product}', 'ShopController@show')->name('shop.show');
Route::post('cart/{product}', 'CartController@store')->name('cart.store');
Route::put('cart/{id}', 'CartController@update')->name('cart.update');
Route::delete('cart/{product}','CartController@destroy')->name('cart.remove');
Route::post('shop/wishlist/{product}', 'CartController@wishlist')->name('cart.wishlist');
Route::get('cart', 'CartController@index')->name('cart.index');


// Wishlist Controller
Route::delete('movetocart/{product}','CartController@destroyWishlist')->name('cart.removeWishlist');
Route::post('shop/movetocart/{product}', 'CartController@movetoCart')->name('cart.movetoCart');

Route::get('empty', function(){
    Cart::instance('wishlist')->destroy();
});

// Checkout Controller
Route::resource('checkout', 'CheckoutController');



Route::get('success', 'PagesController@thankyou')->name('completed');
Route::resource('appointment', 'ReserveController');
