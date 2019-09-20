<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\HospitalFeedback;
use App\DoctorFeedback;

class FeedBackController extends Controller
{
    //
    public function hospitalFeedback(Request $request, $id) {
        
        
        
        $this->validate($request, [
            'feedback' => 'required',
        ]);

        $hospitalFeedback = new HospitalFeedback;
        
        $user = Auth::user();
        $hospitalFeedback->user_id = $user->id;
        $hospitalFeedback->hospital_id = $id;
        $hospitalFeedback->name = $user->name;
        $hospitalFeedback->email = $user->email;
        $hospitalFeedback->feedback = $request->feedback;

        $hospitalFeedback->save();
        
        $hf = HospitalFeedback::where('user_id', $user->id)->get();
        
        return back()->with('success', 'Thanks for your feedback.')->with('hf', $hf);
        //return view('web.hospital.hospital_details', compact('hf'));
    }

    public function doctorFeedback(Request $request, $id) {

        $this->validate($request, [
            'feedback' => 'required',
        ]);

        $doctorFeedback = new DoctorFeedback;
        
        $user = Auth::user();
        $doctorFeedback->user_id = $user->id;
        $doctorFeedback->doctor_id = $id;
        $doctorFeedback->name = $user->name;
        $doctorFeedback->email = $user->email;
        $doctorFeedback->feedback = $request->feedback;

        $doctorFeedback->save();
        
        
        return back()->with('success', 'Thanks for your feedback.');
    }
}
