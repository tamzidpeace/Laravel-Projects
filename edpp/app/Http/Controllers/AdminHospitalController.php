<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminHospitalController extends Controller
{
    //

    public function __construct()
    {
        return $this->middleware(['isAdmin', 'auth']);
    }

    public function allHospitals() {
        $hospitals = Hospital::all();
        return view('admin.hospitals.all_hospitals', compact('hospitals'));
    }

    public function registeredHospitals()
    {
        $hospitals = Hospital::all()->where('status', 'registered');
        return view('admin.hospitals.registered_hospitals', compact('hospitals'));
    }


    public function blockedHospitals()
    {
        $hospitals = Hospital::all()->where('status', 'blocked');
        return view('admin.hospitals.blocked_hospitals', compact('hospitals'));
    }

    public function block($id)
    {
        $hospital = Hospital::find($id);


        $hospital->status = 'blocked';
        $user_id = $hospital->user_id;
        $user = User::find($user_id);
        $user->role_id = null;

        $hospital->save();
        $user->save();

        return back()->with('info', 'Hospital is blocked!');
    }

    public function unblock($id)
    {
        $hospital = Hospital::find($id);

        $hospital->status = 'registered';
        $user_id = $hospital->user_id;
        $user = User::find($user_id);
        $user->role_id = 2;

        $hospital->save();
        $user->save();

        return back()->with('success', 'Hospital is unblocked!');
    }

    public function detailes($id)
    {

        $hospital = Hospital::find($id);
        return view('admin.hospitals.hospital_details', compact( 'hospital'));
    }
}
