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
Route::get('/login','AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/web-login','AuthController@postLogin');
Route::post('/login','AuthController@login');
Route::post('/change-password','AuthController@postChangePassword');
Route::post('/send-otp','AuthController@sendOtp');
Route::post('/verify-otp','AuthController@verifyOtp');
Route::get('/logout','AuthController@logout');
Route::get('/search','HomeController@search');
Route::get('/doctorID/{id}','HomeController@doctorPublicProfile');
Route::get('/email_activation/{token}', 'AuthController@email_activation');
Route::get('/message', 'AuthController@myMessage');



/*=======================Admin Routes Starts==========================*/
Route::group(['middleware' => ['auth','admin']], function () {

	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/doctors', 'AdminController@doctors');
	Route::get('/admin/doctor/profile/{id}', 'AdminController@doctorProfile');
	Route::get('/admin/doctor/activate/{id}', 'AdminController@activateDoctor');
	Route::get('/admin/doctor/deactivate/{id}', 'AdminController@deactivateDoctor');
	Route::get('/admin/doctor/delete/{id}', 'AdminController@deleteDoctor');

	Route::get('/admin/patients', 'AdminController@patients');
	Route::get('/admin/patient/activate/{id}', 'AdminController@activatePatient');
	Route::get('/admin/patient/deactivate/{id}', 'AdminController@deactivatePatient');
	Route::get('/admin/patient/delete/{id}', 'AdminController@deletePatient');	

});
/*=========================Admin Routes End============================*/




/*======================= Patient Routes Start==========================*/
Route::group(['middleware' => ['auth','patient']], function () {

	Route::get('/patient/profile/edit','PatientController@getEditProfile');
	Route::post('/patient/profile/update','PatientController@postEditProfile');
	Route::get('/patient/profile','PatientController@getProfile');


});
/*========================= Patient Routes End============================*/




/*======================= Doctor Routes Start==========================*/
Route::group(['middleware' => ['auth','doctor']], function () {

	Route::get('/doctor/profile','HomeController@doctorProfile');
	Route::get('/doctor/profile/edit','DoctorController@getEditProfile');
	Route::post('/doctor/profile/edit','DoctorController@postEditProfile');
	Route::get('/doctor/remove-clinic-image/{image_id}','DoctorController@deleteClinicImage');
	Route::post('/doctor/redeem-code','DoctorController@redeemCode');

});
/*========================= Doctor Routes End============================*/
