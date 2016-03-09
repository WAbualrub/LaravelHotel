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

Route::get('/', 'HomeController@index');


Route::get('home', 'HomeController@index');

Route::get('search','HotelController@get_search_page');

route::resource('queries','HotelController@search_h');

Route::post('hotel', 'HotelController@store');
Route::resource('hotel', 'HotelController');

Route::post('city', 'CityController@store');
Route::resource('city', 'CityController');

Route::post('country', 'CountryController@store');
Route::resource('country', 'CountryController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
