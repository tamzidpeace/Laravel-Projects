<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hospital;
use App\Doctor;

class HospitalController extends Controller
{
    //

    public function __construct() 
    {
        $this->middleware('isHospital')->except(['registration','store']);
    }

    public function registration()
    {
        $user = Auth::user();
        return view('hospital.registration', compact('user'));
    }

    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $hospital = new Hospital();

        $user = Auth::user();

        // image file process
        $file = $request->file('photo');
        $image_file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/hospital_image', $image_file_name);

        $hospital->user_id = $user->id;
        $hospital->role_id = 2;
        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->email = $request->email;
        $hospital->status = 'pending';
        $hospital->photo = $image_file_name;

        $hospital->save();

        return redirect('home')->with('success', 'Your request has been submitted');
    }

    public function dashboard() {
        return view('hospital.dashboard');
    }

    public function allDoctors() {
        
        $doctors = Doctor::all();
        return view('hospital.doctors.all_doctors', compact('doctors'));
    }

    public function pendingRequests() {
        $user = Auth::user();
        $hospital_id = $user->hospital->id;
        $doctors = Hospital::find($hospital_id)->doctors()->get()->first();
        $doctors2 = Hospital::find($hospital_id)->doctors()->get();
        return $doctors2;
    }
}
