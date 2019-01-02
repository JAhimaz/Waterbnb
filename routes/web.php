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

//All Users
Route::get('/', 'ListingsController@index')->name('root');
Route::get('listings', 'ListingsController@index')->name('listing.index');

//Logged in Users
Route::middleware('auth')->group(function(){
  //Creating Post
  Route::get('listings/create', 'ListingsController@create')->name('listing.create');
  //Logout
  Route::get('logout', 'AuthController@logout')->name('logout');
});

//Non Users
Route::middleware('guest')->group(function(){
  //Login Routes
  Route::get('login', 'AuthController@showLogin')->name('login.show');
  Route::post('login', 'AuthController@login')->name('login.store');
  //Sign
  Route::get('signup', 'AuthController@showSignup')->name('signup.show');
  Route::post('signup', 'AuthController@signup')->name('signup.store');
});
