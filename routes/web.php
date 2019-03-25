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


    Route::get('/auth_login_admin', function(){
        return "admin Login Form";
    })->name('auth_login_admin');
    Route::get('/auth_login_user', function(){
        return "User Login Form";
    })->name('auth_login_user');



    Route::get('/klove/{toString}', "KloveController@index");



    Auth::routes();

    Route::get('/',function(){
        return view('layouts.pages.index');
    });
    Route::get('/about', 'webController@about');
    Route::get('/contact', 'webController@contact');
    Route::get('/blog', 'webController@blog');


//    Route::post('/auth/admin', 'admin\adminController@checkAdmin')->name('admin.auth');
//    Route::get('/auth/admin', 'admin\adminController@loginform')->name('admin.auth.login');

Route::group(['prefix'=>'admin','namespace'=>'admin','as'=>"admin."], function () {
    Auth::routes();
});

Route::group(['prefix'=>'admin','middleware'=>'admin'], function () {
        include('admin_web.php');
    });


    Route::group(['middleware'=>'web'], function () {
        include('frontend_web.php');
    });
