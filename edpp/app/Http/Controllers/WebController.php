<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialist;
use App\Hospital;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Donation;
use App\BloodGroup;
use App\Day;
use App\HospitalFeedback;
use App\DoctorFeedback;
use App\HospitalDepartment;
use App\Patient;

class WebController extends Controller
{
    //


    public function index()
    {
        $doctors = Doctor::all();
        $specialists = Specialist::all();
        return view('web.doctor.Doctor', compact(['doctors', 'specialists']));
    }

    public function doctorSearch(Request $request)
    {

        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $doctors = Doctor::where([['name', 'LIKE', '%' . $search . '%'], ['status', 'registered-doctor']])
            ->orWhere('address', 'LIKE', '%' . $search . '%')
            ->get();
        if (count($doctors) > 0)
            return view('web.doctor.doctor_search', compact('doctors'));
        else
            return view('web.doctor.doctor_search', compact('doctors'));
    }

    public function doctorBySpecialist($id)
    {
        $doctors = Specialist::find($id)->doctors->where('status', 'registered-doctor');

        return view('web.doctor.doctor_search', compact('doctors'));
    }

    public function doctorDetailsAndAppointment($id)
    {
        $doctor = Doctor::find($id);

        $day = date("l");
        $days = Day::where('name', '<>', $day)->pluck('name', 'id')->all();

        $m = date("m");
        $de = date("d");
        $y = date("Y");

        for ($i = 1; $i <= 6; $i++)
            $date[$i - 1] = date('d-m-y : l', mktime(0, 0, 0, $m, ($de + $i), $y));

        $period = ['morning', 'afternoon', 'evening'];

        if (!Auth::guest()) {
            $user = Auth::user();
            $doctorFeedback = new DoctorFeedback;
            $all_feedback = DoctorFeedback::where('user_id', $user->id)->where('doctor_id', $id)->get();

            return view('web.doctor.doctor_details_and_appointment', compact('doctor', 'days', 'date', 'period', 'all_feedback'));
        } else {
            return view('web.doctor.doctor_details_and_appointment', compact('doctor', 'days', 'date', 'period'));
        }
    }

    //hospital
    public function hospitalIndex()
    {
        //$hospitals = Hospital::all()->where('status', 'registered');
        $hospitals = Hospital::where('status', 'registered')->paginate(5);
        return view('web.hospital.hospital', compact('hospitals'));
    }

    public function hospitalSearch(Request $request)
    {
        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $hospitals = Hospital::where([['name', 'LIKE', '%' . $search . '%'], ['status', 'registered']])
            ->orWhere('address', 'LIKE', '%' . $search . '%')
            ->paginate(5);

        if (count($hospitals) > 0)
            return view('web.hospital.hospital_search', compact('hospitals'));
        else
            return view('web.hospital.hospital_search', compact('hospitals'));
    }

    public function hospitalDetails($id)
    {

        $user = Auth::user();

        $patient = Patient::where('user_id', $user->id)->first();

        $hospital = Hospital::find($id);

        //$blood_groups = BloodGroup::pluck('name', 'id')->all();
        $departments = HospitalDepartment::where('hospital_id', $hospital->id)
            ->pluck('department_name', 'id')->all();

        if (!Auth::guest()) {
            $hospitalFeedback = new HospitalFeedback;
            $all_feedback = HospitalFeedback::where('user_id', $user->id)->where('hospital_id', $id)->get();
            return view('web.hospital.hospital_details', compact('hospital', 'all_feedback', 'patient', 'departments'));
        } else {

            return view('web.hospital.hospital_details', compact('hospital'));
        }
    }


    //home
    public function home()
    {
        return view('web.others.home');
    }

    //about
    public function contact()
    {

        if (Auth::user()) {
            $user = Auth::user();
            return view('web.others.contact')->with('user', $user);
        } else {
            $user = array("name" => "", "email" => "");
            return view('web.others.contact', compact('user'));

            //return $user;
            //return view('web.others.contact', compact('user'));
        }
    }
    // Donation
    public function donor()
    {
        $donors = Donation::all();
        return view('donation.donor', compact('donors'));
    }
    public function donorform()
    {

        if (Auth::user()) {
            $user = Auth::user();
            $blood_groups = BloodGroup::pluck('name', 'id')->all();
            return view('donation.donorform', compact('user', 'blood_groups'));
        } else {
            $user = array("name" => "", "email" => "");
            $blood_groups = BloodGroup::pluck('name', 'id')->all();
            return view('donation.donorform', compact('user', 'blood_groups'));
        }
        //return view('donation.donorform');
        // return view('donation.donorform');
        //return 123;
    }
    public function donorstore(Request  $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'bloodgroup' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required'
        ]);
        $donors = new Donation();

        $file = $request->file('photo');
        $image_file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/donor_image', $image_file_name);

        $donors->name = $request->name;
        $donors->blood_group_id = $request->bloodgroup;
        $donors->phone = $request->phone;
        $donors->address = $request->address;
        $donors->photo = $image_file_name;
        $donors->status = "pending-donor";


        $donors->save();

        return redirect('/edpp/donation');
        //return $donors;
    }
}
