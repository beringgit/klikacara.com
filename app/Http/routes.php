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

Route::get('/', 'PageController@home');
Route::get('/about', 'PageController@about');
Route::get('/services', 'PageController@services');
Route::get('/order', 'PageController@order');
Route::get('/contact', 'PageController@contact');
Route::get('/events', 'PageController@events');
Route::get('/events/{event}', 'PageController@events_show');

Route::post('/contact','EmailController@sendFromContact');
//Route::resource('events','EventController');
Route::resource('providers','ProviderController');

Route::auth();
Route::auth();

Route::get('/home', 'HomeController@index');
