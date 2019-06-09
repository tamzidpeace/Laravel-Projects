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
Route::get('/admin/search/doctors', 'AdminController@doctorSearch');
Route::get('/admin/search/hospitals', 'AdminController@hospitalSearch');
Route::get('/admin/search/patients', 'AdminController@patientSearch');


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
Route::get('/admin/registered-doctors', 'AdminDoctorController@registeredDoctors');
Route::get('/admin/blocked-doctors', 'AdminDoctorController@blockedDoctors');
Route::patch('/admin/{id}/doctor', 'AdminDoctorController@accept');
Route::patch('/admin/{id}/block-doctor', 'AdminDoctorController@block');
Route::patch('/admin/{id}/unblock-doctor', 'AdminDoctorController@unblock');
Route::delete('/admin/{id}/doctor', 'AdminDoctorController@rejectOrRemove');
Route::get('/admin/doctor/{id}/detailes', 'AdminDoctorController@detailes');
Route::get('/admin/doctor/specialists', 'AdminDoctorController@showSpecialistsList');
Route::post('/admin/doctor/specialist/add', 'AdminDoctorController@addNewSpecialistType');
Route::get('/admin/doctor/specialist/edit/{id}', 'AdminDoctorController@editSpecialistItem');
Route::patch('/admin/doctor/specialist/update/{id}', 'AdminDoctorController@updateSpecialistItem');
Route::delete('/admin/doctor/specialist/remove/{id}', 'AdminDoctorController@removeSpecialistItem');


//admin patient routes
Route::get('/admin/patients', 'AdminPatientController@allPatients')->name('admin.patients');
Route::get('/admin/patient/registered-patients', 'AdminPatientController@registeredPatients');
Route::get('/admin/patient/blocked-patients', 'AdminPatientController@blockedPatients');
Route::get('/admin/patient/pending-patients', 'AdminPatientController@newPatientsRequests');
Route::patch('/admin/patient/{id}/accept', 'AdminPatientController@accept');
Route::patch('/admin/patient/{id}/block', 'AdminPatientController@block');
Route::patch('/admin/patient/{id}/unblock', 'AdminPatientController@unblock');
Route::delete('/admin/patient/{id}/reject', 'AdminPatientController@rejectOrRemove');
Route::get('/admin/patient/{id}/details', 'AdminPatientController@details');



//hospital routes
Route::post('/hospital/registration', 'HospitalController@store')->middleware(['isNewUser', 'auth']);
Route::get('/hospital/registration', 'HospitalController@registration')->middleware(['isNewUser', 'auth']);
Route::get('/hospital', 'HospitalController@dashboard');
Route::get('/hospital/doctor/all-doctors', 'HospitalController@allDoctors');
Route::get('/hospital/doctor/pending-doctors', 'HospitalController@pendingDoctors');
Route::get('/hospital/doctor/registered-doctors', 'HospitalController@registeredDoctors');
Route::get('/hospital/doctor/blocked-doctors', 'HospitalController@blockedDoctors');
Route::patch('/hospital/doctor/{id}/accept', 'HospitalController@accept');
Route::patch('/hospital/doctor/{id}/block', 'HospitalController@block');
Route::patch('/hospital/doctor/{id}/unblock', 'HospitalController@unblock');
Route::delete('/hospital/doctor/{id}/reject', 'HospitalController@reject');


//doctor routes
Route::get('/doctor/registration', 'DoctorController@registration')->middleware(['isNewUser', 'auth']);
Route::post('/doctor/registration', 'DoctorController@store')->middleware(['isNewUser', 'auth']);
Route::get('/doctor', 'DoctorController@dashboard');
Route::get('/doctor/all-hospitals', 'DoctorController@allHospitals');
Route::get('/doctor/working-hospitals', 'DoctorController@workingHospitals');
Route::post('/doctor/working-request/{id}', 'DoctorController@workingRequest');


//patient routes
Route::get('/patient/registration', 'PatientController@registration')->middleware(['isNewUser', 'auth']);
Route::post('/patient/registration', 'PatientController@store')->middleware(['isNewUser', 'auth']);
