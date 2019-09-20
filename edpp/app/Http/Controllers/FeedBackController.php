<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\HospitalFeedback;

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
}
