<?php

namespace App\Http\Controllers;

use App\Emergency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Hospital;

class EmergencyController extends Controller
{


  public function index()
  {
    $hospitals = Emergency::where('status', 'inactive')->get();

    return view('emergency.emergency')->with('hospitals', $hospitals);
  }

  public function emergencyForm()
  {
    $user = Auth::user();
    $hospital = Hospital::where('user_id', $user->id)->first();

    return view('emergency.emergency_form', compact('hospital'));
  }

  public function emergencyRegistration(Request $request)
  {

    $this->validate($request, [
      'name' => 'required',
      'email' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'photo' => 'required'
    ]);
    $es = new Emergency();

    $file = $request->file('photo');
    $image_file_name = time() . '_' . $file->getClientOriginalName();
    $file->move('images/es_image', $image_file_name);

    $es->name = $request->name;
    $es->email = $request->email;
    $es->phone = $request->phone;
    $es->address = $request->address;
    $es->photo = $image_file_name;
    $es->about = $request->about;

    $es->save();

    return redirect('/edpp/emergency')->with('success', 'registration is on progress, please wait for confirmation');

  }

  public function emergencySearch(Request $request) {
    
    
    $this->validate($request, ['search' => 'required']);

        $search = $request->search;
        $es = Emergency::where([['name', 'LIKE', '%' . $search . '%'], ['status', 'active']])
        ->orWhere([['address', 'LIKE', '%' . $search . '%'], ['status', 'active']])
        ->get();
        if (count($es) > 0)
            return view('emergency.emergency_search', compact('es'));
        else
            return view('emergency.emergency_search', compact('es'));

    //return 123;
  }
}
