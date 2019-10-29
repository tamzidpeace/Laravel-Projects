<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\BloodGroup;
use App\Gender;
use App\working_state;
use App\Doctor;
use App\Hospital;
use App\Day;
use App\Appointment;

class PatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['isPatient', 'auth'])->except(['registration', 'store']);
    }

    public function registration()
    {
        $user = Auth::user();
        $blood_groups = BloodGroup::pluck('name', 'id')->all();
        $genders = Gender::pluck('name', 'id')->all();
        return view('patient.registration', compact(['user', 'blood_groups', 'genders']));
    }

    public function store(Request $request)
    {
        //form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'blood_group' => 'required',
        ]);

        $user = Auth::user();

        $patient = new Patient();

        // image file process
        $file = $request->file('photo');
        $image_file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/patient_image', $image_file_name);

        $patient->user_id = $user->id;
        $patient->role_id = 4;
        $patient->blood_group_id = $request->blood_group;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender_id = $request->sex;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->status = 'pending-patient';
        $patient->photo = $image_file_name;


        $patient->save();

        return redirect('/edpp/home')->with('success', 'Your request for patient role has been submitted, please wait for confirmation');
    }

    // appointment booking
    public function bookAppointmentInfo(Request $request, $doctor_id)
    {

        $m = date("m");
        $de = date("d");
        $y = date("Y");

        for ($i = 1; $i <= 6; $i++)
            $date[$i - 1] = date('d-m-y : l', mktime(0, 0, 0, $m, ($de + $i), $y));

        $period = ['morning', 'afternoon', 'evening'];

        $pd = $period[$request->period];
        $dt = $date[$request->date];
        $da = Day::find($request->day)->name;


        $booking = new Patient();

        $patient = Auth::user()->patient;
        $doctor = Doctor::find($doctor_id);
        $hospital = Hospital::find($request->hospital);

        $booking->patient_id = $patient->id;
        $booking->doctor_id = $doctor_id;
        $booking->hospial_id = $request->hospital;
        $booking->period = $period[$request->period];
        $booking->day = $request->day;
        $booking->date = $date[$request->date];

        $wsm = working_state::where([
            ['doctor_id', $doctor_id],
            ['hospital_id', $request->hospital],
            ['day_id', $request->day],
            ['m_status', 'active'],
            ['m_visit_amount', '<>', 'null']
        ])->get()->first();

        $wsa = working_state::where([
            ['doctor_id', $doctor_id],
            ['hospital_id', $request->hospital],
            ['day_id', $request->day],
            ['a_status', 'active'],
            ['a_visit_amount', '<>', 'null']
        ])->get()->first();

        $wse = working_state::where([
            ['doctor_id', $doctor_id],
            ['hospital_id', $request->hospital],
            ['day_id', $request->day],
            ['e_status', 'active'],
            ['e_visit_amount', '<>', 'null']
        ])->get()->first();



        if ($wsm == null && $wsa == null && $wse == null) {
            return back()->with('warning', 'Sorry, Appointment not available!');
        } else {
            if ($period[$request->period] == 'morning') {
                //
                $ab = working_state::where([['m_visit_amount_b', '<', $wsm->m_visit_amount],])->get()->first();

                if ($ab == null) {
                    return back()->with('warning', 'Sorry, Appointment not available!');
                } else {
                    return view('patient.booking', compact('booking', 'ab', 'patient', 'doctor', 'hospital', 'dt', 'pd', 'da'));
                }
            } elseif ($period[$request->period] == 'afternoon') {
                //
                $ab = working_state::where([['a_visit_amount_b', '<', $wsa->m_visit_amount],])->get()->first();

                if ($ab == null) {
                    return back()->with('warning', 'Sorry, Appointment not available!');
                } else {
                    return view('patient.booking', compact('booking', 'ab', 'patient', 'doctor', 'hospital', 'dt', 'pd', 'da'));
                }
            } else {
                //
                $ab = working_state::where([['e_visit_amount_b', '<', $wse->e_visit_amount],])->get()->first();

                if ($ab == null) {
                    return back()->with('warning', 'Sorry, Appointment not available!');
                } else {
                    return view('patient.booking', compact('booking', 'ab', 'patient', 'doctor', 'hospital', 'dt', 'pd', 'da'));
                }
            }
        }
    }

    // end of appointment info process

    public function bookAppointment(Request $request)
    {
        $appointment = new Appointment;

        $ws = working_state::find($request->ws);
        $patient_id = Auth::user()->patient->id;

        $appointment->working_state_id = $request->ws;
        $appointment->patient_id = $patient_id;
        $appointment->doctor_id = $ws->doctor_id;
        $appointment->hospital_id = $ws->hospital_id;
        $appointment->day_id = $ws->day_id;
        $appointment->patient_name = $request->name;
        $appointment->patient_sex = $request->sex;
        $appointment->patient_email = $request->email;
        $appointment->patient_blood_group = $request->blood_group;
        $appointment->patient_age = $request->age;
        $appointment->patient_phone = $request->phone;
        $appointment->period = $request->period;
        $appointment->date = $request->date;
        $appointment->status = 'pending';

        $appointment->save();

        return redirect('edpp/doctors')->with('success', 'Your appointment request has been placed. 
        You will be notified by email after confirmation.');
    }

    public function appointments() {

        $patient_id = Auth::user()->patient->id;

        //pending
        $appointments_pending = Appointment::where([['patient_id', $patient_id],['status', 'pending']])->get();
        //booked
        $appointments = Appointment::where([['patient_id', $patient_id],['status', 'booked']])->get();
        //previous
        $appointmentsP = Appointment::where([['patient_id', $patient_id],['status', 'previous']])->get();

        return view('patient.appointments', compact('appointments', 'appointmentsP', 'appointments_pending'));
    }

    
}
