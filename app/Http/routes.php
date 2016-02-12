<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('abouts/daftar', 'AboutsController@daftar');
    Route::get('blogs/daftar', 'BlogsController@daftar');
    Route::get('galleries/daftar', 'GalleriesController@daftar');
    Route::get('products/daftar', 'ProductsController@daftar');
    Route::get('questions/daftar', 'QuestionsController@daftar');
    Route::get('services/daftar', 'ServicesController@daftar');

    Route::resource('/abouts', 'AboutsController');
    Route::resource('/blogs', 'BlogsController');
    Route::resource('/galleries', 'GalleriesController');
    Route::resource('/products', 'ProductsController');
    Route::resource('/questions', 'QuestionsController');
    Route::resource('/services', 'ServicesController');
    
});
