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
Route::get('advertise', 'HomeController@advertise');
Route::get('terms', 'HomeController@terms');
Route::get('contact', 'HomeController@contact');

Route::resource('records', 'RecordsController');
Route::resource('categories', 'CategoriesController');

Route::get('tags/{tags}', 'RecordsController@tags');

Route::controllers([
    'auth'=>'Auth\AuthController',
    'pass'=>'Auth\PasswordController',
]);

Route::get('/{name}', 'RecordsController@categories');