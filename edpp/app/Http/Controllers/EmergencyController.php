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
    $hospitals = Emergency::where('status', 'active')->get();

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
    //

    $user = Auth::user();

    $id = $user->id;

    $check_user = Emergency::where('user_id', $id)->get();

    $result = count($check_user);

    if ($result == 0) {

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

      $es->user_id = $user->id;
      $es->name = $request->name;
      $es->email = $request->email;
      $es->phone = $request->phone;
      $es->address = $request->address;
      $es->photo = $image_file_name;
      $es->about = $request->about;

      $es->save();

      return redirect('/edpp/emergency')->with('success', 'registration is on progress, please wait for confirmation');
    } else
      return redirect('/edpp/emergency')->with('info', 'you have already registered');
  }

  public function emergencySearch(Request $request)
  {


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

  // for admin

  public function allES()
  {
    $all_es = Emergency::all();
    return view('admin.emergency.all_es', compact('all_es'));
  }

  public function newES()
  {

    $new_es = Emergency::where('status', 'requested')->get();
    return view('admin.emergency.new_es', compact('new_es'));
  }

  public function registeredES()
  {

    $registered_es = Emergency::where('status', 'active')->get();
    return view('admin.emergency.registered_es', compact('registered_es'));
  }

  public function blockedES()
  {
    //

    $blocked_es = Emergency::where('status', 'inactive')
      ->orWhere('status', 'blocked')
      ->get();
    return view('admin.emergency.block_and_inactive', compact('blocked_es'));
  }

  public function active($id)
  {
    //

    $es = Emergency::find($id);
    $es->status = 'active';

    //updating information in both user and patient table
    $es->save();

    return back()->with('success', 'Activated sccessful!');
  }

  public function inactive($id)
  {
    $es = Emergency::find($id);
    $es->status = 'inactive';

    //updating information in both user and patient table
    $es->save();

    return back()->with('danger', 'Activated sccessful!');
  }

  public function blocked($id)
  {
    $es = Emergency::find($id);
    $es->status = 'blocked';

    //updating information in both user and patient table
    $es->save();

    return back()->with('danger', 'Activated sccessful!');
  }
}
