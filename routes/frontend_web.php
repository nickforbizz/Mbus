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

 Route::get('/testing', function(){
     return Auth::guard('web')->user();
 });

    // Route::get('/', 'pagesController@welcome');
    Route::get('/ticketing', 'webController@ticket');
    Route::get('/ticketRoute/{id}', 'webController@ticketRoute')->name('ticketRoute');
    // post
    Route::post('/bookTicket', 'webController@bookTicket');
    Route::post('/contactMessage', 'webController@contactMessage');
    // newsletter
    Route::get('newsletter',[
        'uses'=>'NewsLetterController@create',
        'as'=>'newsletter'
    ]);
    Route::post('apply_newsletter',[
        'uses'=>'NewsLetterController@store',
        'as'=>'apply_newsletter'
    ]);
