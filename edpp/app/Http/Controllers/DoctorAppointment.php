<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Appointment;

class DoctorAppointment extends Controller
{
    //

    public function allAppointments() {

        $doctor_id = Auth::user()->doctor->id;
        $appointments = Appointment::where([['doctor_id', $doctor_id],])->get();

        return view('doctor.appointment.all_appointments', compact('appointments'));
    }

    public function bookedAppointments() {

        $doctor_id = Auth::user()->doctor->id;
        $booked_appointments = Appointment::where([['doctor_id', $doctor_id], ['status', 'booked']])->get();

        return view('doctor.appointment.booked_appointments', compact('booked_appointments'));
    }

    public function previousAppointments() {

        $doctor_id = Auth::user()->doctor->id;
        $previous_appointments = Appointment::where([['doctor_id', $doctor_id], ['status', 'previous']])->get();

        return view('doctor.appointment.previous_appointments', compact('previous_appointments'));
    }

    public function cancelRequest($id) {

        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'cancel-request';
        $appointment->save();
        
        return back()->with('Cancel Request Sent!');
    }
}
