<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialist;

class WebController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::all();
        $specialists = Specialist::all();
        return view('web.Doctor', compact(['doctors', 'specialists']));
    }
}
