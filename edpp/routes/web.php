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
Route::get('/admin/requests', 'AdminController@requests');
Route::patch('/admin/{id}/hospital', 'AdminController@accept');
Route::delete('/admin/{id}/hospital', 'AdminController@reject');


//admin hospital routes
Route::get('/admin/hospitals', 'AdminHospitalController@allHospitals');
Route::get('/admin/hospitals/registered', 'AdminHospitalController@registeredHospitals');
Route::get('/admin/hospitals/blocked', 'AdminHospitalController@blockedHospitals');
Route::patch('/admin/hospital/{id}/block', 'AdminHospitalController@block');
Route::patch('/admin/hospital/{id}/unblock', 'AdminHospitalController@unblock');


//hospital routes
Route::get('/hospital/registration', 'HospitalController@registration')->middleware('isNewUser');
Route::post('/hospital/registration', 'HospitalController@store')->middleware('isNewUser');
Route::get('/hospital', 'HospitalController@dashboard');

//doctor routes
Route::get('/doctor/registration', 'DoctorController@registration')->middleware('isNewUser');
Route::post('/doctor/registration', 'DoctorController@store')->middleware('isNewUser');