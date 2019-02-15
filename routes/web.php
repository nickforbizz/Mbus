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

// static pages
Route::get('/', 'pagesController@welcome');

Route::get('/about', 'pagesController@about');

Route::get('/contact', 'pagesController@contact');

Route::get('users/user', 'pagesController@user');
Route::post('users/registerUser', 'UserController@register' );
Route::post('users/updateUser', 'UserController@updateUser' );
Route::get('users/addUser', 'pagesController@addUser');
Route::get('users/assignRole/{user_id}', 'pagesController@assignRole');

Route::get('bus/view_bus', 'pagesController@bus');
Route::get('bus/add', 'pagesController@addBus');
Route::get('bus/maintenance', 'pagesController@maintenance');
Route::get('bus/edit/{bus_id}', 'pagesController@editBus');




Route::post('/registerBus', 'BusController@register' );
Route::post('/registerBusRoute', 'BusrouteController@register' );


Route::get('/klove/{toString}', "KloveController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
