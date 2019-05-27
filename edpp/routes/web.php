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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/user', 'AdminController@user');

//hospital routes
Route::get('/hospital/registration', 'HospitalController@registration');
Route::post('/hospital/registration', 'HospitalController@store');