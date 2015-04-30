<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Route::get('/', "IndexController@indexAction"); */




Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('/login', 'UsersController@login');
Route::post('/login', 'UsersController@doLogin');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
//
Route::resource("/","UsersController@login");
Route::resource("panel/kategori","KategoriController");
Route::get("panel/kategori/{id}/delete","KategoriController@destroy");
Route::get("panel/tag/{id}/delete","TagController@destroy");
Route::resource("panel/tag","TagController");

Route::resource("file/photo","PhotoController");
Route::resource("panel/tips","TipsController");
Route::get("panel/tips/{id}/delete","TipsController@delete");
Route::post("panel/tips/{id}/update","TipsController@update");
Route::post("panel/tips/deleteall","TipsController@deleteallAction");

Route::get("panel/batik","TipsController@indexBatik");
Route::get("panel/batik/create","TipsController@createBatik");
Route::post("panel/batik/store","TipsController@storeBatik");
Route::get("panel/batik/{id}/delete","TipsController@deleteBatik");
Route::get("panel/batik/{id}/edit","TipsController@editBatik");
Route::post("panel/batik/{id}/update","TipsController@updateBatik");
Route::post("panel/batik/deleteall","TipsController@deleteallBatik");

Route::get("panel/laundryguide","TipsController@indexLaundryguide");
Route::get("panel/laundryguide/create","TipsController@createLaundryguide");
Route::post("panel/laundryguide/store","TipsController@storeLaundryguide");
Route::get("panel/laundryguide/{id}/delete","TipsController@deleteLaundryguide");
Route::get("panel/laundryguide/{id}/edit","TipsController@editLaundryguide");
Route::post("panel/laundryguide/{id}/update","TipsController@updateLaundryguide");
Route::post("panel/laundryguide/deleteall","TipsController@deleteallLaundryguide");

Route::get("panel/promoevent","TipsController@indexPromoevent");
Route::get("panel/promoevent/create","TipsController@createPromoevent");
Route::post("panel/promoevent/store","TipsController@storePromoevent");
Route::get("panel/promoevent/{id}/delete","TipsController@deletePromoevent");
Route::get("panel/promoevent/{id}/edit","TipsController@editPromoevent");
Route::post("panel/promoevent/{id}/update","TipsController@updatePromoevent");
Route::post("panel/promoevent/deleteall","TipsController@deleteallPromoevent");

