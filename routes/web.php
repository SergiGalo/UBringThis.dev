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

/* Llistes */
Route::get('/lists', 'LlistesController@index');
Route::get('/lists/create', 'LlistesController@create');
Route::post('/lists', 'LlistesController@store');
Route::get('/lists/{id}', 'LlistesController@show');
Route::get('/lists/{id}/edit', 'LlistesController@edit');
Route::put('/lists/{id}', 'LlistesController@update');
Route::delete('/lists/{id}', 'LlistesController@destroy');

/* Productes */
Route::post('/products/store', 'ProductesController@store');
Route::get('/products/{p_id}/edit', 'ProductesController@edit');
Route::put('/products/{p_id}', 'ProductesController@update');
Route::delete('/products/{p_id}', 'ProductesController@destroy');

/* Colaboradors */
Route::get('/colaborations/{id}', 'ColaboradorsController@show');
Route::post('/colaborations', 'ColaboradorsController@store');
Route::delete('/colaborations/{id}', 'ColaboradorsController@destroy');


/* Registres */
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

/* Sessions */
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
