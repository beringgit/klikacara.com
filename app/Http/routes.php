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
Route::resource('providers','ProviderController');


Route::auth();


Route::get('/admin/login','AdminAuthController@showLoginForm');
Route::post('/admin/login','AdminAuthController@login');
Route::get('admin/register', 'AdminAuthController@getRegister');
Route::post('admin/register', 'AdminAuthController@register');
Route::get('/admin/password/reset','AdminAuthController@resetPassword');

Route::get('/provider/login','ProviderAuthController@showLoginForm');
Route::get('/provider/register','ProviderAuthController@showRegisterForm');
Route::get('/provider/password/reset','ProviderPasswordController@resetPassword');


Route::group(['middleware' => ['admin']], function(){
    Route::get('/admin/logout','AdminAuthController@logout');
    Route::get('/admin', 'AdminController@index');
});


Route::group(['middleware' => ['provider']], function(){
    Route::get('/provider/logout','ProviderAuthController@logout');

    // Registration Routes...
    Route::get('provider/register', 'ProviderAuthController@showRegistrationForm');
    Route::post('provider/register', 'ProviderAuthController@register');

    Route::get('/provider', 'ProviderController@index');
});

Route::resource('articles','ArticleController');
Route::resource('article_category','ArticleCategoryController');

// Routes for Facebook login

Route::get('/auth/facebook','Auth\AuthController@redirectToFacebookProvider');
Route::get('/auth/facebook/callback','Auth\AuthController@handleFacebookProviderCallback');


// Routes for Twitter login

Route::get('/auth/twitter','Auth\AuthController@redirectToTwitterProvider');
Route::get('/auth/twitter/callback','Auth\AuthController@handleTwitterProviderCallback');

Route::get('/blog/page/{multiplier}','ArticleController@showList');
Route::get('/blog','ArticleController@index');
Route::get('/blog/posts/{article}','ArticleController@show');
Route::get('/blog/posts/category/{articleCategory}','ArticleCategoryController@showArticles');
Route::get('/blog/posts/author/{author}','ArticleController@showArticlesByAuthor');
Route::get('/blog/posts/date/{date}','ArticleController@showArticlesByDate');
Route::get('/uploads','AttachmentController@get');
Route::get('/attachments','AttachmentController@showAllAttachments');

//Dashboard

Route::get('/dashboard','DashboardController@home');
Route::get('/get/events','EventController@home');
