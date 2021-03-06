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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edpp/home', 'HomeController@index');

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

//admin hospital booking
Route::get('/hospital/booking/departments', 'HospitalBookingController@departments');
Route::post('/hospital/booking/add-department', 'HospitalBookingController@addDepartment');
Route::get('/hospital/booking/edit-department/{id}', 'HospitalBookingController@editDepartment');
Route::patch('/hospital/booking/edited-department/{id}', 'HospitalBookingController@editedDepartment');
Route::delete('/hospital/booking/remove-department/{id}', 'HospitalBookingController@removeDepartment');
Route::get('/hospital/booking/hos-seat', 'HospitalBookingController@hospitalSeat');
Route::patch('/hospital/booking/seat-manage/', 'HospitalBookingController@seatManage');
Route::get('/hospital/booking/booking-requests', 'HospitalBookingController@bookingRequest');
Route::patch('/hospital/booking/booking-requests/accept/{id}', 'HospitalBookingController@acceptBookingRequest');
Route::delete('/hospital/booking/booking-request/reject/{id}', 'HospitalBookingController@rejectBookingRequest');
Route::get('/hospital/booking/confirmed-booking', 'HospitalBookingController@confirmedBooking');
Route::patch('/hospital/booking/confirmed-booking/admitted/{id}', 'HospitalBookingController@confirmBookingRequest');
Route::delete('/hospital/booking/booking-request/confirmed-reject/{id}','HospitalBookingController@rejectConfirmedBooking');
Route::get('/hospital/bookings/admitted-bookings', 'HospitalBookingController@admittedBookings');
Route::get('/hospital/bookings/release/{id}/', 'HospitalBookingController@release');
Route::post('/hospital/bookings/release-cost-calculation/{id}', 'HospitalBookingController@releaseAndCostCalculation');
Route::get('/hospital/bookings/released', 'HospitalBookingController@releaseBookings');
Route::get('/hospital/bookings/released/details/{id}', 'HospitalBookingController@releaseDetails');

// end of admin hospital booking

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
Route::get('/admin/donation/pending-donors', 'AdminDonationController@newDonorsRequest');
Route::patch('/admin/donation/active/{id}', 'AdminDonationController@active');
Route::patch('/admin/donation/inactive/{id}', 'AdminDonationController@inactive');
Route::patch('/admin/donation/blocked/{id}', 'AdminDonationController@blocked');
Route::get('/admin/donor/registered', 'AdminDonationController@registeredDonor');
Route::get('/admin/donation/blocked', 'AdminDonationController@blockDonor');


//admin emergency service
Route::get('/admin/es/all', 'EmergencyController@allES');
Route::get('/admin/es/new', 'EmergencyController@newES');
Route::get('/admin/es/registered', 'EmergencyController@registeredES');
Route::get('/admin/es/blocked', 'EmergencyController@blockedES');
Route::patch('/admin/es/active/{id}', 'EmergencyController@active');
Route::patch('/admin/es/inactive/{id}', 'EmergencyController@inactive');
Route::patch('/admin/es/blocked/{id}', 'EmergencyController@blocked');


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
Route::get('/doctor/working-states/single-rejected/{state}/{id}', 'DoctorController@singleRejected');
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

//hospital booking(patient part)

Route::get('/edpp/hospital/booking/check-avail/{id}', 'HospitalBookingController@checkSeatAvailability');
Route::post('/eddp/hospital/booking/book-hos-seat', 'HospitalBookingController@bookHosSeat');


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
Route::get('/edpp/donation/search', 'DonationController@donorSearch');
Route::get('/edpp/donation/donorform', 'WebController@donorform');
Route::post('/edpp/donation/donorform', 'WebController@donorstore');

//feedback
Route::post('/edpp/feedback/hospital/{id}', 'FeedBackController@hospitalFeedback');
Route::post('/edpp/feedback/doctor/{id}', 'FeedBackController@doctorFeedback');

// Emergency 
Route::get('/edpp/emergency', 'EmergencyController@index');
Route::get('edpp/emergency/search', 'EmergencyController@emergencySearch');
Route::get('/edpp/emergency/emergency-form', 'EmergencyController@emergencyForm');
Route::post('/edpp/emergency/registration', 'EmergencyController@emergencyRegistration');

//Emailvarification 
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

//notification
Route::get('/patient/notification', 'NotificationController@patientNotification');
Route::patch('/patient/notification/details/{id}', 'NotificationController@patientNotificationDetails');

//Appointment Search

Route::get('/doctor/appointments/search', 'DoctorAppointment@searchAppointments');
Route::get('/doctor/appointments/details/{id}', 'DoctorAppointment@appointmentDetails');
Route::get('/doctor/appointment/prescribe/{id}', 'DoctorAppointment@appointmentPrescribe');
Route::patch('/doctor/appointment/prescribe/store/{id}', 'DoctorAppointment@appointmentPrescribeStore');
Route::get('/doctor/appointment/complete/{id}', 'DoctorAppointment@completeAppointment');

// end of appointment search


// form download and view

Route::get('/patient/notification/download/{id}', 'NotificationController@downloadForm');