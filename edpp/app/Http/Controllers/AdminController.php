<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Hospital;
use App\Doctor;
use App\Patient;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['isAdmin', 'auth']);
    }

    public function index()
    {

        //
        return view('admin.index');
    }

    // used in algonia scout driver
    // public function search(Request $request) {

    //     $doctor = Doctor::search($request->search)->get();

    //     return $doctor;
    // }

    public function hospitalSearch(Request $request) {
        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $hospitals = Hospital::where('name', 'LIKE', '%' . $search . '%')->get();
        if (count($hospitals) > 0)
            return view('admin.hospitals.hospital_search', compact( 'hospitals'));
        else
            return view( 'admin.hospitals.hospital_search', compact( 'hospitals'));
    }

    public function doctorSearch(Request $request)
    {
        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $doctors = Doctor::where('name', 'LIKE', '%' . $search . '%')->get();
        if (count($doctors) > 0)
            return view('admin.doctors.doctor_search', compact('doctors'));
        else
            return view('admin.doctors.doctor_search', compact('doctors'));
    }

    public function patientSearch(Request $request)
    {
        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $patients = Patient::where('name', 'LIKE', '%' . $search . '%')->get();
        if (count( $patients) > 0)
            return view('admin.patient.patient_search', compact( 'patients'));
        else
            return view('admin.patient.patient_search', compact( 'patients'));
    }

    public function user()
    {
        Auth::check();
        $users = User::all();
        return view('admin.user')->with('users', $users);
    }

    public function requests()
    {

        $hospitals = Hospital::all()->where('status', 'pending');

        return view('admin.requests')->with('hospitals', $hospitals);
    }

    public function accept($id)
    {
        $hospital = Hospital::find($id);
        $user_id = $hospital->user_id;
        $user = User::find($user_id);

        $hospital->status = 'registered';
        $user->role_id = $hospital->role_id;

        //updating information in both user and hospital table
        $hospital->save();
        $user->save();
        return back()->with('success', 'Request accepted');
    }

    public function reject($id)
    {

        $hospital = Hospital::find($id);
        $hospitalImagePath = 'images/hospital_image/' . $hospital->photo;

        //removing image from public folder
        unlink($hospitalImagePath);

        //removing hospital request entry
        $hospital->delete();

        return back()->with('warning', 'Hospital request removed');
    }
}
