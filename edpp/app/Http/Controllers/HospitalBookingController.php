<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\HospitalDepartment;
use App\HospitalSeat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HospitalBookingController extends Controller
{
    //

    public function departments()
    {

        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();

        $hos = HospitalDepartment::where('hospital_id', $hospital->id)->get();

        $hs = HospitalSeat::where('hospital_id', $hospital->id)->first();
        $ts = $hs->total_seat;
        $as = $hs->available_seat;
        $bs = $hs->booked_seat;

        
        return view('hospital.hospital_booking.department', compact(['hos', 'ts', 'as', 'bs']));
    }

    public function addDepartment(Request $request)
    {

        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();

        $hd = new HospitalDepartment();

        $hd->hospital_id = $hospital->id;
        $hd->department_name = $request->name;

        $hd->save();

        return back()->with('success', 'New Department Added');
    }

    public function removeDepartment($id)
    {

        $department = HospitalDepartment::find($id);

        $department->delete();

        return back()->with('info', 'Department removed');
    }

    public function editDepartment($id)
    {


        $dpt = HospitalDepartment::find($id);
        return view('hospital.hospital_booking.edit_department', compact('dpt'));
    }

    public function editedDepartment(Request $request, $id)
    {

        $dpt = HospitalDepartment::find($id);

        $dpt->department_name = $request->name;
        $dpt->save();

        return redirect('hospital/booking/departments')->with('success', 'Edited Successfully');
    }

    public function seatAmount(Request $request)
    {

        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();

        $hs = new HospitalSeat();

        $check = HospitalSeat::where('hospital_id', $hospital->id)->get();

        if (count($check) > 0) {
            $hs1 = HospitalSeat::where('hospital_id', $hospital->id)->first();

            $hs1->total_seat = $request->amount;

            $hs1->save();
        } else {
            $hs->hospital_id = $hospital->id;
            $hs->total_seat = 0;
            $hs->available_seat = 0;
            $hs->booked_seat = 0;

            $hs->save();
        }


        return back()
            ->with('success', 'saved')
            ->with('hs1', $hs1);
    }

    public function setHsBooking()
    {
        return view('hospital.hospital_booking.set_booking_state');
    }
}
