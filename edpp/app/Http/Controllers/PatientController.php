<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;

class PatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('isPatient')->except(['registration', 'store']);
    }

    public function registration()
    {
        $user = Auth::user();
        return view('patient.registration', compact('user'));
    }

    public function store(Request $request)
    {
        //form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = Auth::user();

        $patient = new Patient();

        // image file process
        $file = $request->file('photo');
        $image_file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/patient_image', $image_file_name);

        $patient->user_id = $user->id;
        $patient->role_id = 4;
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->status = 'pending-patient';
        $patient->photo = $image_file_name;

        $patient->save();

        return redirect('/home')->with('success', 'Your request for patient role has been submitted, please wait for confirmation');
    }
}
