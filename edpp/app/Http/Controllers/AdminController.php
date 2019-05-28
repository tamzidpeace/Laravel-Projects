<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Hospital;

class AdminController extends Controller
{
    //

    public function __construct() {
        $this->middleware('isAdmin');
    }

    public function index() {
        
        //
        $user = Auth::user();
        return view('admin.index');
    }

    public function user() {
        $users = User::all();
        return view('admin.user')->with('users', $users);
    }

    public function requests() {

        $hospitals = Hospital::all()->where('status', 'pending');

        return view('admin.requests')->with('hospitals', $hospitals);
    }

    public function accept($id) {
        $hospital = Hospital::find($id);
        $user_id = $hospital->user_id;
        $user = User::find($user_id);
        
        $hospital->status = 'registered';
        $user->role_id = $hospital->role_id;

        //updating information in both user and hospital table
        $hospital->save();
        $user->save();
        return back()->with('success', 'Request accepted');
    }

    // public function block($id) {
    //     $hospital = Hospital::find($id);

    //     $hospital->status = "block";
        
    //     $hospital->save();
        
    //     return back()->with('warning', 'Hospital has been ');
    // }

    public function reject($id) {
        
        $hospital = Hospital::find($id);
        $hospitalImagePath = 'images/hospital_image/' . $hospital->photo;

        //removing image from public folder
        unlink($hospitalImagePath);
        
        //removing hospital request entry
        $hospital->delete();

        return back()->with('warning', 'Hospital request removed');
    }
}
