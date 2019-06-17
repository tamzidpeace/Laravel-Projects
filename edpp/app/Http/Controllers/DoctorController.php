<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Database\QueryException;
use App\Specialist;
use App\Gender;
use App\User;
use App\Day;

class DoctorController extends Controller
{
    //

    public function __construct()
    {
        return $this->middleware(['isDoctor', 'auth'])->except(['registration', 'store']);
    }

    public function dashboard()
    {
        return view('doctor.dashboard');
    }

    public function registration()
    {
        $user = Auth::user();
        $specialists = Specialist::pluck('name', 'id')->all();
        $genders = Gender::pluck('name', 'id')->all();
        return view('doctor.registration', compact(['user', 'specialists', 'genders']));
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
            'specialist' => 'required',
            'gender' => 'required',
            'degree' => 'required',
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
        $doctor->specialist_id = $request->specialist;
        $doctor->gender_id = $request->gender;
        $doctor->degree = $request->degree;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->status = 'pending-doctor';
        $doctor->photo = $image_file_name;
        $doctor->about = $request->about;

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
            //return back()->with('warning', 'You are already working in this hospital or your request is pending!');
            return back()->withError('You are already working in this hospital or your request is pending!');
        }
    }

    public function workingHospitals()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $doctor = Doctor::get()->where('user_id', $user_id)->first();

        $hospitals = $doctor->hospitals()->get();

        return view('doctor.hospital.working_hospitals', compact('hospitals'));
    }

    public function workingState()
    {
        $user = Auth::user();
        $doctor_id = User::find($user->id)->doctor->id;
        $hospitals = Doctor::find($doctor_id)->hospitals->pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();
        return view('doctor.booking.working_state', compact('hospitals', 'days'));
    }

    public function workingStateResult(Request $request)
    {
        $user = Auth::user();
        $doctor_id = User::find($user->id)->doctor->id;
        $hospitals = Doctor::find($doctor_id)->hospitals->pluck('name', 'id')->all();
        $day = Day::pluck('name', 'id')->all();
        return $request->morningS;
    }
}
