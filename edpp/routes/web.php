<?php
use App\Http\Controllers\DoctorController;

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

//logout route
Route::get('/logout', 'Auth\LoginController@logout');

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
Route::get('/admin/hospital/{id}/detailes', 'AdminHospitalController@detailes');

//admin doctor routes
Route::get('/admin/doctors', 'AdminDoctorController@allDoctors');
Route::get('/admin/new-doctors-requests', 'AdminDoctorController@pendingDoctors');
Route::get( '/admin/registered-doctors', 'AdminDoctorController@registeredDoctors');
Route::get( '/admin/blocked-doctors', 'AdminDoctorController@blockedDoctors');
Route::patch('/admin/{id}/doctor', 'AdminDoctorController@accept');
Route::patch('/admin/{id}/block-doctor', 'AdminDoctorController@block');
Route::patch('/admin/{id}/unblock-doctor', 'AdminDoctorController@unblock');
Route::delete('/admin/{id}/doctor', 'AdminDoctorController@rejectOrRemove');
Route::get('/admin/doctor/{id}/detailes', 'AdminDoctorController@detailes');


//hospital routes
Route::get('/hospital/registration', 'HospitalController@registration')->middleware('isNewUser');
Route::post('/hospital/registration', 'HospitalController@store')->middleware('isNewUser');
Route::get('/hospital', 'HospitalController@dashboard');
Route::get('/hospital/doctor/all-doctors', 'HospitalController@allDoctors');
Route::get('/hospital/doctor/pending-requests', 'HospitalController@pendingRequests');

//doctor routes
Route::get('/doctor/registration', 'DoctorController@registration')->middleware('isNewUser');
Route::post('/doctor/registration', 'DoctorController@store')->middleware('isNewUser');
Route::get('/doctor', 'DoctorController@dashboard');
Route::get('/doctor/all-hospitals', 'DoctorController@allHospitals');
Route::get('/doctor/working-hospitals', 'DoctorController@workingHospitals');
Route::post('/doctor/working-request/{id}', 'DoctorController@workingRequest');