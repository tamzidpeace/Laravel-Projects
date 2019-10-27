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

        return view('hospital.hospital_booking.department', compact(['hos']));
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

    public function hospitalSeat()
    {
        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();
        $hs = HospitalSeat::where('hospital_id', $hospital->id)->first();
        
        return view('hospital.hospital_booking.seat', compact('hs'));
    }

    public function seatManage(Request $request)
    {

        $this->validate($request,
            ['general' => 'required',
            'cabin_ac' => 'required',
            'cabin_nac' => 'required',
            'cost_gen' => 'required',
            'cost_ac' => 'required',
            'cost_nac' => 'required',
            ]
        );
        
        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();

        $hs = new HospitalSeat();

        $check = HospitalSeat::where('hospital_id', $hospital->id)->get();
        $hs1 = HospitalSeat::where('hospital_id', $hospital->id)->first();

        if (count($check) > 0) {


            $hs1->general_total = $request->general;
            $hs1->cost_gen = $request->cost_gen;
            $hs1->cabin_ac_total = $request->cabin_ac;
            $hs1->cost_ac = $request->cost_ac;
            $hs1->cabin_nac_total = $request->cabin_nac;
            $hs1->cost_nac = $request->cost_nac;

            $hs1->save();
        } else {
            $hs->hospital_id = $hospital->id;

            $hs->general_total = $request->general;
            $hs->general_avail = 0;
            $hs->general_booked = 0;
            $hs->cost_gen = $request->cost_gen;

            $hs->cabin_ac_total = $request->cabin_ac;
            $hs->cabin_ac_avail = 0;
            $hs->cabin_ac_booked = 0;
            $hs->cost_ac = $request->cost_ac;

            $hs->cabin_nac_total = $request->cabin_nac;
            $hs->cabin_nac_avail = 0;
            $hs->cabin_nac_booked = 0;
            $hs->cost_nac = $request->cost_nac;

            $hs->save();
        }

        $check2 = HospitalSeat::where('hospital_id', $hospital->id)->first();


        $check2->general_avail = $check2->general_total - $check2->general_booked;
        $check2->cabin_ac_avail = $check2->cabin_ac_total - $check2->cabin_ac_booked;
        $check2->general_avail = $check2->cabin_nac_total - $check2->cabin_nac_booked;

        $check2->save();


        return back()
            ->with('success', 'saved')
            ->with('hs1', $hs1);
    }

    public function checkSeatAvailability(Request $request)
    {
        // $this->validate($request, [
        //     'department' => 'required',
        //     'date' => 'required',
        // ]);
        $decision = 0;
        $date = substr($request->date, 8);
        $date2 = $request->date;
        $today = date("d");

        for ($x = 0; $x < 7; $x++) {
            $ck = date('Y-m-d', strtotime($x . ' day'));
            if ($ck == $date2) {
                $decision = 1;
                break;
            }
        }

        if ($decision == 1)
            return 1;
        else
            return 0;

        //return $request->date;
    }
}
