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

Route::get('/', 'PageController@index')->name('root');
Route::get('listings', 'PageController@index')->name('listing.index');
/*
|----------------------------- Displaying all the listings --------------------------------
|
|
|
|----------------------------- Creating a listings ----------------------------------------
|
|
|
|----------------------------- Filtering all the listings ---------------------------------
|
|
|
|----------------------------- Pagination -------------------------------------------------
*/
