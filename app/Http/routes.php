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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('dashboard', 'PageController@dashboard');
Route::get('ltts', 'PageController@ltts');
Route::get('maps', 'PageController@maps');
Route::get('newsfeed', 'PageController@newsfeed');
Route::get('messages', 'PageController@messages');
Route::get('listtrain', 'PageController@listtrain');
/*
Route::get('dashboard', function(){
    return view('templates/dashboard');
});

Route::get('ltts', function(){
    return view('templates/ltts');
});

Route::get('maps', function(){
    return view('templates/maps');
});*/