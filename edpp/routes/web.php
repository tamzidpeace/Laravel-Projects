<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorAppointment;

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

// Admin Contact
Route::get('/admin/contacts', 'ContactController@index');
// Admin Donation
Route::get('/admin/donations', 'DonationController@allDonors');


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
//hospital doctor working states routes
Route::get('/hospital/doctor/working-state/all', 'HospitalDoctorWorkingStateController@allWorkingStates');
Route::get('/hospital/doctor/working-state/requests', 'HospitalDoctorWorkingStateController@workingStateRequests');
Route::get('/hospital/doctor/working-state/active', 'HospitalDoctorWorkingStateController@activeWorkingStates');
Route::get('/hospital/doctor/working-state/inactive', 'HospitalDoctorWorkingStateController@inactiveWorkingStates');
Route::get('/hospital/doctor/working-state/rejected', 'HospitalDoctorWorkingStateController@rejectedWorkingStates');
Route::patch('/hospital/doctor/workingState/inactive/{id}/{state}', 'HospitalDoctorWorkingStateController@stateInactive');
Route::patch('/hospital/doctor/workingState/active/{id}/{state}', 'HospitalDoctorWorkingStateController@stateActive');
Route::patch('/hospital/doctor/workingState/reject/{id}/{r_state}', 'HospitalDoctorWorkingStateController@stateReject');
//appointment booking hospital admin section
Route::get('/hospital/appointments/pending', 'HospitalController@pendingAppointments');
Route::get('/hospital/appointments/', 'HospitalController@appointments');
Route::patch('/hospital/appointment/accept/{id}', 'HospitalController@acceptAppointment');
Route::delete('/hospital/appointment/reject/{id}', 'HospitalController@rejectAppointment');
Route::delete('/hospital/appointment/cancel/{id}', 'HospitalController@cancelAppointment');
Route::get('/hospital/appointments/booked', 'HospitalController@bookedAppointments');
Route::get('/hospital/appointments/previous', 'HospitalController@previousAppointments');
Route::get('/hospital/appointments/cancel-request', 'HospitalController@cancelRequests');




//doctor routes
Route::get('/doctor/registration', 'DoctorController@registration')->middleware(['isNewUser', 'auth']);
Route::post('/doctor/registration', 'DoctorController@store')->middleware(['isNewUser', 'auth']);
Route::get('/doctor', 'DoctorController@dashboard');
Route::get('/doctor/all-hospitals', 'DoctorController@allHospitals');
Route::get('/doctor/working-hospitals', 'DoctorController@workingHospitals');
Route::post('/doctor/working-request/{id}', 'DoctorController@workingRequest');
//working state
Route::get('/doctor/working-states', 'DoctorController@allWorkingState');
Route::get('/doctor/working-state/edit/{id}', 'DoctorController@editWorkingState');
Route::patch('/doctor/working-state/update/{id}', 'DoctorController@updateWorkingState');
Route::patch('/doctor/working-state/single-update/{id}/{state}', 'DoctorController@singleUpdateWorkingState');
Route::get('/doctor/working-states/active', 'DoctorController@activeWorkingStates');
Route::get('/doctor/working-states/inactive', 'DoctorController@inactiveWorkingStates');
Route::get('/doctor/working-states/rejected', 'DoctorController@rejectedWorkingStates');
Route::get( '/doctor/working-states/single-rejected/{state}/{id}', 'DoctorController@singleRejected');
Route::get('/doctor/set-working-state', 'DoctorController@setWorkingState');
Route::post('/doctor/save-working-state', 'DoctorController@saveWorkingState');
Route::patch('/doctor/workingState/inactive/{id}/{state}', 'DoctorController@stateInactive');
Route::patch('/doctor/workingState/active/{id}/{state}', 'DoctorController@stateActive');
//appointments
Route::get('/doctor/appointments/all', 'DoctorAppointment@allAppointments');
Route::get('/doctor/appointments/booked', 'DoctorAppointment@bookedAppointments');
Route::get('/doctor/appointments/previous', 'DoctorAppointment@previousAppointments');
Route::patch('/doctor/appointments/cancel-request/{id}', 'DoctorAppointment@cancelRequest');


//patient routes
Route::get('/patient/registration', 'PatientController@registration')->middleware(['isNewUser', 'auth']);
Route::post('/patient/registration', 'PatientController@store')->middleware(['isNewUser', 'auth']);
//appointment booking
Route::get('/patient/appointment-booking-info/{doctor_id}', 'PatientController@bookAppointmentInfo');
Route::post('/patient/appointment-booking/', 'PatientController@bookAppointment');
Route::get('/patient/appointments', 'PatientController@appointments');


//web routes
//home
Route::get('/edpp/home', 'WebController@home');
//doctor
Route::get('/edpp/doctors', 'WebController@index');
Route::get('/edpp/doctors/search-results', 'WebController@doctorSearch');
Route::get('/edpp/doctors/search-results-by-specialist/{id}', 'WebController@doctorBySpecialist');
Route::get('/edpp/doctor/details/{id}', 'WebController@doctorDetailsAndAppointment');

//hospital
Route::get('/edpp/hospitals', 'WebController@hospitalIndex');
Route::get('/edpp/hospitals/search-result', 'WebController@hospitalSearch');
Route::get('/edpp/hospital/details/{id}', 'WebController@hospitalDetails');
//contact
Route::get('/edpp/contact-report', 'WebController@contact');
Route::post('/edpp/contact-report', 'ContactController@store');
// Donation
Route::get('/edpp/donation', 'WebController@donor');
Route::get('/edpp/donation/donorform', 'WebController@donorform');
Route::post('/edpp/donation/donorform', 'WebController@donorstore');

//feedback
Route::post('/edpp/feedback/hospital', 'FeedBackController@hospitalFeedback');
