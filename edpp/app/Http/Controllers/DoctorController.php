<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Database\QueryException;
use App\Doctor;
use App\Hospital;
use App\DoctorHospital;
use Mockery\Exception;

class DoctorController extends Controller
{
    //

    public function __construct()
    {
        return $this->middleware('isDoctor')->except(['registration', 'store',]);
    }

    public function dashboard()
    {
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

    public function allHospitals()
    {
        $hospitals = Hospital::all()->where('status', 'registered');
        return view('doctor.hospital.all_hospitals', compact('hospitals'));
    }

    public function workingRequest($id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $doctor = Doctor::get()->where('user_id', $user_id)->first();
        $doctor_id = $doctor->id;

        $findDoctor = Doctor::find($doctor_id);
        $findHospital = Hospital::find($id);

        //save relationship in pivot table
        try {
            $findDoctor->hospitals()->save($findHospital, ['status' => 'pending']);

            return back()->with('success', 'Your request has send to that hospital!');
        } catch (QueryException $e) {
            //var_dump($e->errorInfo);
            //abort(500, 'Something went wrong'); 
            return back()->with('warning', 'You are already working in this hospital or your request is pending!');
        }

        //find you after whole day search(update the record of pivot table)
        //$findDoctor->hospitals()->newPivotStatement()->where('id', 7)->update(['status' => 'ok']);

        //deleteing attempt
        //$findDoctor->hospitals()->newPivotStatement()->where('id', id)->delete();
    }

    public function workingHospitals()
    { }
}
