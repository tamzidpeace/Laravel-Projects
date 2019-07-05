<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hospital;
use App\Doctor;
use App\Appointment;
use App\working_state;

class HospitalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['isHospital', 'auth'])->except(['registration', 'store']);
    }

    public function registration()
    {
        $user = Auth::user();
        return view('hospital.registration', compact('user'));
    }

    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $hospital = new Hospital();

        $user = Auth::user();

        // image file process
        $file = $request->file('photo');
        $image_file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/hospital_image', $image_file_name);

        $hospital->user_id = $user->id;
        $hospital->role_id = 2;
        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->email = $request->email;
        $hospital->status = 'pending';
        $hospital->photo = $image_file_name;
        $hospital->phone = $request->phone;
        $hospital->about = $request->about;

        $hospital->save();

        return redirect('home')->with('success', 'Your request has been submitted');
    }

    public function dashboard()
    {
        return view('hospital.dashboard');
    }

    public function allDoctors()
    {

        $user = Auth::user();
        $hospital_id = $user->hospital->id;
        $doctors = Hospital::find($hospital_id)->doctors()->get();

        return view('hospital.doctors.all_doctors', compact('doctors'));
    }

    // get all pending doctors
    public function pendingDoctors()
    {
        $user = Auth::user();
        $hospital_id = $user->hospital->id;
        $doctors = Hospital::find($hospital_id)->pendingDoctors()->get();

        return view('hospital.doctors.pending_doctors', compact('doctors'));
    }

    //get all registered doctors
    public function registeredDoctors()
    {
        $user = Auth::user();
        $hospital_id = $user->hospital->id;
        $doctors = Hospital::find($hospital_id)->registeredDoctors()->get();

        return view('hospital.doctors.registered_doctors', compact('doctors'));
    }

    //get all blocked doctors
    public function blockedDoctors()
    {
        $user = Auth::user();
        $hospital_id = $user->hospital->id;
        $doctors = Hospital::find($hospital_id)->blockedDoctors()->get();

        return view('hospital.doctors.blocked_doctors', compact('doctors'));
    }

    public function accept($id)
    {
        $user = Auth::user();
        $hospital = Hospital::get()->where('user_id', $user->id)->first();
        $doctor = Doctor::findOrFail($id);

        $doctor->hospitals()->newPivotStatement()
            ->where([['doctor_id', '=', $id], ['hospital_id', '=', $hospital->id]])->update(['status' => 'registered']);

        return back()->with('success', 'Doctor registration complete');
    }

    public function reject($id)
    {
        $user = Auth::user();
        $hospital = Hospital::get()->where('user_id', $user->id)->first();
        $doctor = Doctor::findOrFail($id);

        $doctor->hospitals()->newPivotStatement()
            ->where([['doctor_id', '=', $id], ['hospital_id', '=', $hospital->id]])->delete();

        return back()->with('danger', 'Doctor request rejected');
    }

    public function block($id)
    {
        $user = Auth::user();
        $hospital = Hospital::get()->where('user_id', $user->id)->first();
        $doctor = Doctor::findOrFail($id);

        $doctor->hospitals()->newPivotStatement()
            ->where([['doctor_id', '=', $id], ['hospital_id', '=', $hospital->id]])->update(['status' => 'blocked']);

        return back()->with('info', 'Doctor Blocked');
    }

    public function unblock($id)
    {
        $user = Auth::user();
        $hospital = Hospital::get()->where('user_id', $user->id)->first();
        $doctor = Doctor::findOrFail($id);

        $doctor->hospitals()->newPivotStatement()
            ->where([['doctor_id', '=', $id], ['hospital_id', '=', $hospital->id]])->update(['status' => 'registered']);

        return back()->with('success', 'Doctor Unblocked');
    }

    //booking operations
    public function appointments()
    {

        $hospital_id = Auth::user()->hospital->id;
        $appointments = Appointment::where([['hospital_id', $hospital_id],])->get();

        return view('hospital.appointment.all_appointments', compact('appointments'));
    }

    public function pendingAppointments()
    {
        //
        $hospital_id = Auth::user()->hospital->id;
        $pending_appointments = Appointment::where([['hospital_id', $hospital_id], ['status', 'pending']])->get();

        return view('hospital.appointment.pending_appointments', compact('pending_appointments'));
    }

    public function acceptAppointment($id)
    {

        $appointment = Appointment::findOrFail($id);
        $period = $appointment->period;
        $working_state = working_state::find($appointment->working_state_id);

        if ($period == 'morning') {
            $working_state->m_visit_amount_b +=  1;
        } elseif ($period == 'afternoon') {
            $working_state->a_visit_amount_b +=  1;
        } else {
            $working_state->e_visit_amount_b +=  1;
        }

        $appointment->status = 'booked';

        $appointment->save();
        $working_state->save();

        return back()->with('success', 'Appointment Booked Successfully');
    }

    public function rejectAppointment($id)
    {

        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return back()->with('warning', 'Appointment Removed');
    }

    public function bookedAppointments()
    {
        $hospital_id = Auth::user()->hospital->id;
        $booked_appointments = Appointment::where([['hospital_id', $hospital_id], ['status', 'booked']])->get();

        return view('hospital.appointment.booked_appointments', compact('booked_appointments'));
    }

    public function previousAppointments()
    {
        $hospital_id = Auth::user()->hospital->id;
        $previous_appointments = Appointment::where([['hospital_id', $hospital_id], ['status', 'previous']])->get();

        return view('hospital.appointment.previous_appointments', compact('previous_appointments'));
    }

    public function cancelAppointment($id)
    {

        $appointment = Appointment::findOrFail($id);
        $period = $appointment->period;
        $working_state = working_state::find($appointment->working_state_id);

        if ($period == 'morning') {
            $working_state->m_visit_amount_b -=  1;
        } elseif ($period == 'afternoon') {
            $working_state->a_visit_amount_b -=  1;
        } else {
            $working_state->e_visit_amount_b -=  1;
        }

        $working_state->save();
        $appointment->delete();

        return back()->with('warning', 'Appointment Canceled');
    }



    //end of booking operation
}
