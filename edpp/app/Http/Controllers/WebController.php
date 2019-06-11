<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialist;

class WebController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::all();
        $specialists = Specialist::all();
        return view('web.Doctor', compact(['doctors', 'specialists']));
    }

    public function doctorSearch(Request $request)
    {

        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $doctors = Doctor::where([['name', 'LIKE', '%' . $search . '%'], ['status', 'registered-doctor']])->get();
        if (count($doctors) > 0)
            return view('web.doctor_search', compact('doctors'));
        else
            return view('web.doctor_search', compact('doctors'));
    }

    public function doctorBySpecialist($id)
    {
        $doctors = Specialist::find($id)->doctors->where('status', 'registered-doctor');

        return view('web.doctor_search', compact('doctors'));
    }

    public function doctorDetailsAndAppointment($id) {
        $doctor = Doctor::find($id);
        return view('web.doctor_details_and_appointment', compact('doctor'));
    }
}
