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
use App\working_state;

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

    //start of working states operations
    public function allWorkingState()
    {
        $user = Auth::user();
        $doctor_id = User::find($user->id)->doctor->id;

        $working_states = working_state::where('doctor_id', $doctor_id)->get();
        return view('doctor.working_state.all_working_states', compact('working_states'));
    }

    public function editWorkingState($id)
    {
        $ws = working_state::findOrFail($id);
        return view('doctor.working_state.edit_working_state', compact('ws'));
    }

    public function updateWorkingState(Request $request, $id)
    {

        $working_state = working_state::findOrFail($id);

        $working_state->payment = $request->payment;

        //morning start,end time + max visit amount    
        $working_state->morning = $request->morningS . '-' . $request->morningE . ' am';
        $working_state->m_visit_s = $request->morningS;
        $working_state->m_visit_e = $request->morningE;
        $working_state->m_visit_amount = $request->morningA;

        //afternoon start,end time + max visit amount
        $working_state->afternoon = $request->afternoonS . '-' . $request->afternoonE . ' pm';
        $working_state->a_visit_s = $request->afternoonS;
        $working_state->a_visit_e = $request->afternoonE;
        $working_state->a_visit_amount = $request->afternoonA;

        ////evening start,end time + max visit amount
        $working_state->evening = $request->eveningS . '-' . $request->eveningE . ' pm';
        $working_state->e_visit_s = $request->eveningS;
        $working_state->e_visit_e = $request->eveningE;
        $working_state->e_visit_amount = $request->eveningA;

        $working_state->save();

        return redirect('/doctor/working-states')->with('success', 'Working State Updated!');
    }

    public function activeWorkingStates()
    {
        $user = Auth::user();
        $doctor_id = User::find($user->id)->doctor->id;

        $morning_actives = working_state::where([['m_status', '=', 'active'], ['m_visit_s', '<>', 'null'], ['doctor_id', '=', $doctor_id]])->get();
        $afternoon_actives = working_state::where([['a_status', '=', 'active'], ['a_visit_s', '<>', 'null'], ['doctor_id', '=', $doctor_id]])->get();
        $evening_actives = working_state::where([['e_status', '=', 'active'], ['e_visit_s', '<>', 'null'], ['doctor_id', '=', $doctor_id]])->get();

        return view(
            'doctor.working_state.active_working_states',
            compact(['morning_actives', 'afternoon_actives', 'evening_actives'])
        );
    }

    public function inactiveWorkingStates()
    {
        $morning_inactives = working_state::where('m_status', '=', 'inactive')->get();
        $afternoon_inactives = working_state::where('a_status', '=', 'inactive')->get();
        $evening_inactives = working_state::where('e_status', '=', 'inactive')->get();

        return view(
            'doctor.working_state.inactive_working_states',
            compact(['morning_inactives', 'afternoon_inactives', 'evening_inactives'])
        );
    }

    public function setWorkingState()
    {
        $user = Auth::user();
        $doctor_id = User::find($user->id)->doctor->id;
        $hospitals = Doctor::find($doctor_id)->hospitals->pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();
        return view('doctor.working_state.set_working_state', compact('hospitals', 'days'));
    }

    public function saveWorkingState(Request $request)
    {
        $this->validate($request, [
            'hospital' => 'required',
            'day' => 'required',
            'payment' => 'required',
        ]);

        $working_state = new working_state;

        $user = Auth::user();
        $working_state->doctor_id = User::find($user->id)->doctor->id;
        $working_state->hospital_id = $request->hospital;
        $working_state->day_id = $request->day;
        $working_state->payment = $request->payment;

        //morning start,end time + max visit amount
        $working_state->m_status = 'active-request';
        $working_state->morning = $request->morningS . '-' . $request->morningE . ' am';
        $working_state->m_visit_s = $request->morningS;
        $working_state->m_visit_e = $request->morningE;
        $working_state->m_visit_amount = $request->morningA;

        //afternoon start,end time + max visit amount
        $working_state->a_status = 'active-request';
        $working_state->afternoon = $request->afternoonS . '-' . $request->afternoonE . ' pm';
        $working_state->a_visit_s = $request->afternoonS;
        $working_state->a_visit_e = $request->afternoonE;
        $working_state->a_visit_amount = $request->afternoonA;

        ////evening start,end time + max visit amount
        $working_state->e_status = 'active-request';
        $working_state->evening = $request->eveningS . '-' . $request->eveningE . ' pm';
        $working_state->e_visit_s = $request->eveningS;
        $working_state->e_visit_e = $request->eveningE;
        $working_state->e_visit_amount = $request->eveningA;

        $working_state->save();

        return back()->with('success', 'working state saved!');
    }

    //set working state inactive
    public function stateInactive($id, $state)
    {

        $ws = working_state::findOrFail($id);

        if ($state == 'morning')
            $ws->m_status = 'inactive-request';
        elseif ($state == 'afternoon')
            $ws->a_status = 'inactive-request';
        else
            $ws->e_status = 'inactive-request';

        $ws->save();
        return back()->with('info', 'This working state is inactive now!');
    }

    //set working state active
    public function stateActive($id, $state)
    {
        $ws = working_state::findOrFail($id);

        if ($state == 'morning')
            $ws->m_status = 'active-request';
        elseif ($state == 'afternoon')
            $ws->a_status = 'active-request';
        else
            $ws->e_status = 'active-request';

        $ws->save();
        return back()->with('info', 'This working state is inactive now!');
    }

    // end of working states operations
}
