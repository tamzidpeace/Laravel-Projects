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

    public function doctorSearch(Request $request) {

        $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $doctors = Doctor::where('name', 'LIKE', '%' . $search . '%')->get();
        if (count($doctors) > 0)
            return view( 'web.doctor_search', compact('doctors'));
        else
            return view( 'web.doctor_search', compact('doctors'));
    }
}
