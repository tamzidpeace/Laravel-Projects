<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\HospitalDepartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HospitalBookingController extends Controller
{
    //

    public function departments() {
        return view('hospital.hospital_booking.department');
    }

    public function addDepartment(Request $request) {

        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();
        
        $hd = new HospitalDepartment();
        
        $hd->hospital_id = $hospital->id;
        $hd->department_name = $request->name;

        $hd->save();

        return back()->with('success', 'New Department Added');

    }
}
