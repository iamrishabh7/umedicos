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
Route::get('/','AuthController@index');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
Route::get('/search','HomeController@search');
Route::get('/doctorID/{id}','HomeController@doctorPublieProfile');
Route::get('/doctor/profile','HomeController@index');
