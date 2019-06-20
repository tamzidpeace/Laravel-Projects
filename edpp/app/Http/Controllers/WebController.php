<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialist;
use App\Hospital;
use Illuminate\Support\Facades\Auth;
use App\User;

class WebController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::all();
        $specialists = Specialist::all();
        return view('web.doctor.Doctor', compact(['doctors', 'specialists']));
    }

    public function doctorSearch(Request $request)
    {

        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $doctors = Doctor::where([['name', 'LIKE', '%' . $search . '%'], ['status', 'registered-doctor']])->get();
        if (count($doctors) > 0)
            return view('web.doctor.doctor_search', compact('doctors'));
        else
            return view('web.doctor.doctor_search', compact('doctors'));
    }

    public function doctorBySpecialist($id)
    {
        $doctors = Specialist::find($id)->doctors->where('status', 'registered-doctor');

        return view('web.doctor.doctor_search', compact('doctors'));
    }

    public function doctorDetailsAndAppointment($id)
    {
        $doctor = Doctor::find($id);
        return view('web.doctor.doctor_details_and_appointment', compact('doctor'));
    }

    //hospital
    public function hospitalIndex()
    {
        //$hospitals = Hospital::all()->where('status', 'registered');
        $hospitals = Hospital::where('status', 'registered')->paginate(5);
        return view('web.hospital.hospital', compact('hospitals'));
    }

    public function hospitalSearch(Request $request)
    {
        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $hospitals = Hospital::where([['name', 'LIKE', '%' . $search . '%'], ['status', 'registered']])->paginate(5);
        if (count($hospitals) > 0)
            return view('web.hospital.hospital_search', compact('hospitals'));
        else
            return view('web.hospital.hospital_search', compact('hospitals'));
    }

    public function hospitalDetails($id) {

        $hospital = Hospital::find($id);
        return view('web.hospital.hospital_details', compact('hospital'));
    }


    //home
    public function home() {
        return view('web.others.home');
    }

    //about
    public function contact()
    {

      if( Auth::user()){
        $user = Auth::user();
        return view('web.others.contact')->with('user',$user);
      }
      else {
           $user = array("name"=>"","email"=>"");
           return view('web.others.contact', compact('user'));

           //return $user;
        //return view('web.others.contact', compact('user'));
    }
  }
}
