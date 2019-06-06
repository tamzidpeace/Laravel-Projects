<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;

class AdminPatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function allPatients()
    {

        $patients = Patient::all();
        return view('admin.patient.all_patients', compact('patients'));
    }

    public function registeredPatients()
    {
        $patients = Patient::get()->where('status', 'registered-patient');
        return view('admin.patient.registered_patients', compact('patients'));
    }

    public function blockedPatients()
    {
        $patients = Patient::get()->where('status', 'blocked-patient');
        return view('admin.patient.blocked_patients', compact('patients'));
    }

    public function newPatientsRequests()
    {
        $patients = Patient::get()->where('status', 'pending-patient');
        return view('admin.patient.new_patients_requests', compact('patients'));
    }

    public function accept($id)
    {

        $patient = Patient::find($id);
        $user_id = $patient->user_id;
        $user = User::find($user_id);

        $patient->status = 'registered-patient';
        $user->role_id = $patient->role_id;

        //updating information in both user and patient table
        $patient->save();
        $user->save();

        return back()->with('success', 'Patient registration sccessful!');
    }


    public function rejectOrRemove($id)
    {
        $patient = Patient::find($id);
        $patientImagePath = 'images/patient_image/' . $patient->photo;

        //removing image from public folder
        unlink($patientImagePath);

        //reseting patient role
        $user_id = $patient->user_id;
        $user = User::find($user_id);
        $user->role_id = null;

        $user->save();

        //removing patient request entry
        $patient->delete();

        return back()->with('info', 'Request rejected!');
    }

    public function block($id)
    {
        $patient = Patient::find($id);

        $patient->status = 'blocked-patient';
        $user_id = $patient->user_id;
        $user = User::find($user_id);
        $user->role_id = null;

        $patient->save();
        $user->save();

        return back()->with('info', 'Patient is blocked!');
    }

    public function unblock($id)
    {
        $patient = Patient::find($id);

        $patient->status = 'registered-patient';
        $user_id = $patient->user_id;
        $user = User::find($user_id);
        $user->role_id = 4;

        $patient->save();
        $user->save();

        return back()->with('info', 'Patient is unblocked!');
    }
}
