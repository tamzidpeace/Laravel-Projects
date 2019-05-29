<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Doctor;

class DoctorController extends Controller
{
    //

    public function __construct()
    {
        return $this->middleware('isDoctor')->except(['registration', 'store',]);
    }

    public function dashboard() {
        return view('doctor.dashboard');
    }

    public function registration()
    {
        $user = Auth::user();
        return view('doctor.registration')->with('user', $user);
    }

    public function store(Request $request)
    {

        //

        //form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = Auth::user();

        $doctor = new Doctor();

        // image file process
        $file = $request->file('photo');
        $image_file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/doctor_image', $image_file_name);

        $doctor->user_id = $user->id;
        $doctor->role_id = 3;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->status = 'pending-doctor';
        $doctor->photo = $image_file_name;

        $doctor->save();

        return redirect('/home')->with('success', 'Your request for doctor role has been submitted, please wait for confirmation');
    }
}
