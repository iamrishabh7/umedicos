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
Route::post('/change-password','AuthController@postChangePassword');
Route::post('/send-otp','AuthController@sendOtp');
Route::post('/verify-otp','AuthController@verifyOtp');
Route::get('/logout','AuthController@logout');
Route::get('/search','HomeController@search');
Route::get('/doctorID/{id}','HomeController@doctorPublieProfile');
Route::get('/doctor/profile','HomeController@doctorProfile');
Route::get('/doctor/profile/edit','DoctorController@getEditProfile');
Route::post('/doctor/profile/edit','DoctorController@postEditProfile');
Route::post('/doctor/redeem-code','DoctorController@redeemCode');
Route::get('/patient/profile/edit','PatientController@getEditProfile');
Route::post('/patient/profile/update','PatientController@postEditProfile');
Route::get('/patient/profile','PatientController@getProfile');