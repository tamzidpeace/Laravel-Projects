<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\HospitalFeedback;

class FeedBackController extends Controller
{
    //
    public function hospitalFeedback(Request $request) {
        
        $this->validate($request, [
            'feedback' => 'required',
        ]);

        $hospitalFeedback = new HospitalFeedback;
        
        $user = Auth::user();
        $hospitalFeedback->name = $user->name;
        $hospitalFeedback->email = $user->email;
        $hospitalFeedback->feedback = $request->feedback;

        $hospitalFeedback->save();
        
        return back()->with('success', 'Thanks for your feedback.');
    }
}
