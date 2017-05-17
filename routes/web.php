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

Route::get('/lists', 'LlistesController@index');
Route::get('/lists/create', 'LlistesController@create');
Route::post('/lists/store', 'LlistesController@store');
Route::get('/lists/{id}', 'LlistesController@show');
Route::put('/lists/{id}', 'LlistesController@delete');

Route::post('/products/store', 'ProductesController@store');
Route::put('/products/{id}', 'ProductesController@delete');


Auth::routes();

Route::get('/home', 'HomeController@index');
