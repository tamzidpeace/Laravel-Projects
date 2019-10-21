<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class EmergencyController extends Controller
{
    
    
    public function index()
    {
      $allhospitals = DB::table('hospitals')->get();

      return view('emergency.emergency')->with('allhospitals',$allhospitals);
    }
   
    
}
