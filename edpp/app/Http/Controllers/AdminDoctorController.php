<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Specialist;

class AdminDoctorController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['isAdmin', 'auth']);
    }

    public function allDoctors()
    {

        $doctors = Doctor::all();
        return view('admin.doctors.all_doctors', compact('doctors'));
    }

    public function pendingDoctors()
    {

        $doctors = Doctor::all()->where('status', 'pending-doctor');

        return view('admin.doctors.new_doctor_request', compact('doctors'));
    }

    public function registeredDoctors()
    {
        $doctors = Doctor::all()->where('status', 'registered-doctor');

        return view('admin.doctors.registered_doctors', compact('doctors'));
    }

    public function blockedDoctors()
    {
        $doctors = Doctor::all()->where('status', 'blocked-doctor');

        return view('admin.doctors.blocked_doctors', compact('doctors'));
    }

    public function accept($id)
    {
        $doctor = Doctor::find($id);
        $user_id = $doctor->user_id;
        $user = User::find($user_id);

        $doctor->status = 'registered-doctor';
        $user->role_id = $doctor->role_id;

        //updating information in both user and hospital table
        $doctor->save();
        $user->save();
        return back()->with('success', 'Request accepted');
    }

    public function rejectOrRemove($id)
    {
        $doctor = Doctor::find($id);
        $doctorImagePath = 'images/doctor_image/' . $doctor->photo;

        //removing image from public folder
        unlink($doctorImagePath);

        //reseting doctor role
        $user_id = $doctor->user_id;
        $user = User::find($user_id);
        $user->role_id = null;

        $user->save();

        //removing hospital request entry
        $doctor->delete();

        return back()->with('warning', 'Request rejected or Doctor removed');
    }

    public function block($id)
    {
        $doctor = Doctor::find($id);

        $doctor->status = 'blocked-doctor';
        $user_id = $doctor->user_id;
        $user = User::find($user_id);
        $user->role_id = null;

        $doctor->save();
        $user->save();

        return back()->with('info', 'Doctor is blocked!');
    }

    public function unblock($id)
    {
        $doctor = Doctor::find($id);

        $doctor->status = 'registered-doctor';
        $user_id = $doctor->user_id;
        $user = User::find($user_id);
        $user->role_id = 3;

        $doctor->save();
        $user->save();

        return back()->with('success', 'Hospital is unblocked!');
    }

    public function detailes($id)
    {

        $doctor = Doctor::find($id);
        return view('admin.doctors.doctor_detailes', compact('doctor'));
    }

    // specialist section

    public function showSpecialistsList()
    {

        $specialists = Specialist::all();
        return view('admin.doctors.specialists', compact('specialists'));
    }

    public function addNewSpecialistType(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        $specialist = new Specialist;
        $specialist->name = $name;

        $specialist->save();

        return back()->with('success', 'New Specialist Type Added!');
    }

    public function editSpecialistItem($id) {
        $specialist = Specialist::findOrFail($id);
        return view('admin.doctors.update_specialist_item', compact('specialist'));
    }

    public function updateSpecialistItem(Request $request, $id)
    {
        $specialist = Specialist::findOrFail($id);
        $specialist->name = $request->name;
        $specialist->save();
        echo "<script type=\"text/javascript\"> alert('hi');  </script>";
        return redirect('admin/doctor/specialists')->with('success', 'Item Updated!');
    }

    public function removeSpecialistItem($id)
    {
        $specialist = Specialist::findOrFail($id);

        $specialist->delete();

        return back()->with('info', 'Item removed!');
    }
}
