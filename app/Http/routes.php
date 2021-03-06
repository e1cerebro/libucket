<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//The index route. its the default route when the user visit the website
Route::get('/','LocationControlller@index')->name('index');
//returns all the locations in the city
Route::get('/locations','LocationControlller@all')->name('all');
//This handles the search when a user searches for a single library through a post request
Route::post('locationsearch','LocationControlller@locationsearch' )->name('locationsearch');
//returns all the locations in the city
Route::get('/contact','ContactController@contact')->name('contact');
//
Route::post('contact','ContactController@verify' )->name('verify');
//
Route::get('about','AboutController@index' )->name('about');
//
Route::get('sendemail', 'Email@sendemail');
Route::get('send',function(){
    
    return view('emails.welcome');
});

