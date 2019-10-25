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

        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();

        $hos = HospitalDepartment::where('hospital_id', $hospital->id)->get();

        

        return view('hospital.hospital_booking.department', compact('hos'));
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

    public function removeDepartment($id) {

        $department = HospitalDepartment::find($id);

        $department->delete();

        return back()->with('info', 'Department removed');

    }

    public function editDepartment($id) {


        $dpt = HospitalDepartment::find($id);
        return view('hospital.hospital_booking.edit_department', compact('dpt'));
    }

    public function editedDepartment(Request $request, $id) {

        $dpt = HospitalDepartment::find($id);

        $dpt->department_name = $request->name;
        $dpt->save();
        
        return redirect('hospital/booking/departments')->with('success', 'Edited Successfully');
    }
}
