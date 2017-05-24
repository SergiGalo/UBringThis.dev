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

/* Users */
Route::post('/colaborations', 'ColaboradorsController@store');


Auth::routes();

Route::get('/home', 'HomeController@index');
