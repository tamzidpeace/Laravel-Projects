<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\HospitalBooking;
use App\HospitalDepartment;
use App\HospitalSeat;
use App\HospitalTreatmentCost;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
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

        $this->validate(
            $request,
            [
                'general' => 'required',
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
        $check2->cabin_nac_avail = $check2->cabin_nac_total - $check2->cabin_nac_booked;

        $check2->save();


        return back()
            ->with('success', 'saved')
            ->with('hs1', $hs1);
    }

    public function checkSeatAvailability(Request $request, $id)
    {
        $this->validate($request, [
            'department' => 'required',
            'date' => 'required',
            'seat' => 'required',
        ]);

        //date work
        $decision = 0;
        $date = $request->date;

        for ($x = 0; $x < 7; $x++) {
            $ck = date('Y-m-d', strtotime($x . ' day'));
            if ($ck == $date) {
                $decision = 1;
                break;
            }
        }

        $date_dec = 0;

        if ($decision == 1)
            $date_dec = 1;
        else
            $date_dec = 0;

        //return $date_dec;

        //seat work
        $seat_avail = 0;
        $seat = $request->seat;

        $hos_seat = HospitalSeat::where('hospital_id', $id)->first();
        if ($seat == 'General Seat' && $hos_seat->general_avail > 0) {
            $seat_avail = 1;
        } elseif ($seat == 'Cabin(AC)' && $hos_seat->cabin_ac_avail > 0) {
            $seat_avail = 1;
        } elseif ($seat == 'Cabin(Non-AC)' && $hos_seat->cabin_nac_avail > 0) {
            $seat_avail = 1;
        }

        //return $seat_avail;

        $department = HospitalDepartment::where('id', $request->department)->first();

        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();



        if ($date_dec == 1 && $seat_avail == 1) {
            return view('web.hospital.hospital_booking', compact('department', 'patient', 'id'));
        } else {
            return back()->with('info', 'Sorry, Seat not available. Try different type seat & Seat only available at most 1 week advanced!');
        }
    }

    public function bookHosSeat(Request $request)
    {

        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();

        $hb = new HospitalBooking();

        $hb->hospital_id = $request->hospital_id;
        $hb->department_id = $request->dept_id;
        $hb->patient_id = $patient->id;
        $hb->seat = $request->seat;
        $hb->date = $request->date;
        $hb->patient_name = $request->pname;
        $hb->patient_phone = $request->pphone;
        $hb->patient_email = $request->pemail;
        $hb->patient_address = $request->paddress;
        $hb->status = 'pending';

        $check_booking_state = HospitalBooking::where([['patient_id',  $patient->id], ['status', 'pending']])
            ->orWhere([['patient_id',  $patient->id], ['status', 'booked']])->get();

        $count = count($check_booking_state);

        if ($count == 0) {

            $hb->save();

            return redirect('/edpp/hospitals')
                ->with('success', 'Your booking request send. Please wait for confirmation');
        } else {
            return redirect('/edpp/hospitals')
                ->with('info', 'Sorry, You can not request more than one booking');
        }
    }

    public function bookingRequest()
    {

        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();

        $hs_bookings = HospitalBooking::where([['hospital_id', $hospital->id], ['status', 'pending']])->get();

        //return $hs_bookings;
        return view('hospital.hospital_booking.booking_request', compact('hs_bookings'));
    }

    public function acceptBookingRequest($id)
    {

        $hb = HospitalBooking::find($id);
        $hs = HospitalSeat::where('hospital_id', $hb->hospital_id)->first();

        $general_booked = $hs->general_booked;
        $cabin_ac_booked = $hs->cabin_ac_booked;
        $cabin_nac_booked = $hs->cabin_nac_booked;

        $hb->status = 'confirmed';
        $hb->save();

        if ($hb->seat == 'General Seat') {
            $general_booked++;
            $hs->general_booked = $general_booked;
            $hs->save();
        } elseif ($hb->seat == 'Cabin(AC)') {
            $cabin_ac_booked++;
            $hs->cabin_ac_booked = $cabin_ac_booked;
            $hs->save();
        } else {
            $cabin_nac_booked++;
            $hs->cabin_nac_booked = $cabin_nac_booked;
            $hs->save();
        }

        $hs->general_avail = $hs->general_total - $hs->general_booked;
        $hs->cabin_ac_avail = $hs->cabin_ac_total - $hs->cabin_ac_booked;
        $hs->cabin_nac_avail = $hs->cabin_nac_total - $hs->cabin_nac_booked;

        $hs->save();

        // notification part
        $patient = Patient::where('id', $hb->patient_id)->first();
        $receiver = $patient->name;
        $receiver_user_id = $patient->user_id;

        $user = Auth::user();

        $sender = $user->name;
        $sender_user_id = $user->id;
        $message = "Your booking has been confirmed! Download booking form for hospital admit.";
        $file = $id;

        $noti = new Notification();

        $noti->sender_user_id = $sender_user_id;
        $noti->receiver_user_id = $receiver_user_id;
        $noti->sender = $sender;
        $noti->receiver = $receiver;
        $noti->message = $message;
        $noti->file = $file;

        $noti->save();

        // end of notification part

        return back()->with('success', 'Patient Booking Confirmed!');
    }

    public function rejectBookingRequest($id)
    {

        $hb = HospitalBooking::find($id);

        // notification part

        $patient = Patient::where('id', $hb->patient_id)->first();
        $receiver = $patient->name;
        $receiver_user_id = $patient->user_id;

        $user = Auth::user();

        $sender = $user->name;
        $sender_user_id = $user->id;
        $message = "Sorry, your booking request has been rejected! Please try again later.";

        $noti = new Notification();

        $noti->sender_user_id = $sender_user_id;
        $noti->receiver_user_id = $receiver_user_id;
        $noti->sender = $sender;
        $noti->receiver = $receiver;
        $noti->message = $message;

        $noti->save();

        // end of notification part

        $hb->delete();
        return back()->with('info', 'Booking Request Canceled!');
    }

    public function confirmedBooking()
    {
        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();
        //$hospital_id = HospitalBooking::where('id', $user_id)->first();

        $confirmed_bookings =
            HospitalBooking::where([['hospital_id', $hospital->id], ['status', 'confirmed']])->get();

        //return $confirmed_bookings;

        return view('hospital.hospital_booking.confirmed_booking', compact('confirmed_bookings'));
    }
    public function confirmBookingRequest($id)
    {
        $cbr = HospitalBooking::find($id);
        $cbr->status = "admitted";
        $cbr->save();
        return back()->with('success', 'Patient Admitted');
    }

    public function rejectConfirmedBooking($id)
    {
        $rcb = HospitalBooking::find($id);
        $hs = HospitalSeat::where('hospital_id', $rcb->hospital_id)->first();

        $general_booked = $hs->general_booked;
        $cabin_ac_booked = $hs->cabin_ac_booked;
        $cabin_nac_booked = $hs->cabin_nac_booked;


        if ($rcb->seat == 'General Seat') {
            $general_booked--;
            $hs->general_booked = $general_booked;
            $hs->save();
        } elseif ($rcb->seat == 'Cabin(AC)') {
            $cabin_ac_booked--;
            $hs->cabin_ac_booked = $cabin_ac_booked;
            $hs->save();
        } else {
            $cabin_nac_booked--;
            $hs->cabin_nac_booked = $cabin_nac_booked;
            $hs->save();
        }

        $hs->general_avail = $hs->general_total - $hs->general_booked;
        $hs->cabin_ac_avail = $hs->cabin_ac_total - $hs->cabin_ac_booked;
        $hs->cabin_nac_avail = $hs->cabin_nac_total - $hs->cabin_nac_booked;

        $hs->save();
        $rcb->delete();
        return back()->with('info', 'Booking Cancell Successfully');
    }


    public function admittedBookings()
    {
        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();
        //$hospital_id = HospitalBooking::where('id', $user_id)->first();

        $confirmed_bookings =
            HospitalBooking::where([['hospital_id', $hospital->id], ['status', 'admitted']])->get();

        return view('hospital.hospital_booking.admitted_bookings', compact('confirmed_bookings'));
    }

    public function release($id)
    {
        $rb = HospitalBooking::find($id);

        $admit_date  = $rb->date;

        $release_date = date("Y-m-d");

        $diff = abs(strtotime($release_date) - strtotime($admit_date));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        $hospital_id = $rb->hospital_id;

        $hospital_seat = HospitalSeat::where('hospital_id', $hospital_id)->first();

        if ($rb->seat == 'General Seat') {
            $seat_cost = $days * $hospital_seat->cost_gen;
        } elseif ($rb->seat == 'Cabin(AC)') {
            $seat_cost = $days * $hospital_seat->cost_ac;
        } else {
            $seat_cost = $days * $hospital_seat->cost_nac;
        }

        return view(
            'hospital.hospital_booking.release_cost_calculation',
            compact(['rb', 'days', 'release_date', 'seat_cost'])
        );
    }

    public function releaseAndCostCalculation(Request $request, $id)
    {

        $hb = HospitalBooking::find($id);

        $htc = new HospitalTreatmentCost();

        $htc->hospital_id = $hb->hospital_id;
        $htc->patient_id = $hb->patient_id;
        $htc->hospital_booking_id = $id;
        $htc->patient_name = $request->pname;
        $htc->contact_num = $request->contact_num;
        $htc->admit_date = $request->admit_date;
        $htc->release_date = $request->release_date;
        $htc->seat = $request->seat_cost;
        $htc->medicine = $request->medicine;
        $htc->test = $request->test;
        $htc->operation = $request->operation;
        $htc->others = $request->others;
        $htc->total = $request->total;
        $htc->file = $id;

        $htc->save();

        $hb->status = "released";

        $hb->save();

        return redirect('/hospital/bookings/admitted-bookings')->with('success', 'Booking activities complete successfully!');
    }

    public function releaseBookings() {
        $user = Auth::user();
        $hospital = Hospital::where('user_id', $user->id)->first();
        //$hospital_id = HospitalBooking::where('id', $user_id)->first();

        $released_bookings =
            HospitalBooking::where([['hospital_id', $hospital->id], ['status', 'released']])->get();

        return view('hospital.hospital_booking.released_bookings', compact('released_bookings'));
    }

    public function releaseDetails($id) {

        $hb = HospitalBooking::find($id);
        $cost = HospitalTreatmentCost::where('hospital_id', $id)->first();

        return view('hospital.hospital_booking.release_details', compact('hb', 'cost'));
    }


}
