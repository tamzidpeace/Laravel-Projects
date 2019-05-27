<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
}
