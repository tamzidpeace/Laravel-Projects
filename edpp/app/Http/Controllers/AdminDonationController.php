<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;

class AdminDonationController extends Controller
{
    public function newDonorsRequest()
    {
    	 $donors = Donation::get()->where('status', 'pending-donor');
        return view('admin.donation.new_donor_requests', compact('donors'));
    }
    public function active($id)
  {
    //

    $donor = Donation::find($id);
    $donor->status = 'active';

    //updating information in both user and patient table
    $donor->save();

    return back()->with('success', 'Activated sccessful!');
  }

  public function registeredDonor()
  {

    $registered_donors = Donation::where('status', 'active')->get();
    return view('admin.donation.registered_donor', compact('registered_donors'));
  }

  public function inactive($id)
  {
    $donor = Donation::find($id);
    $donor->status = 'inactive';

    //updating information in both user and patient table
    $donor->save();

    return back()->with('danger', 'Activated sccessful!');
  }

  public function blocked($id)
  {
    $donor = Donation::find($id);
    $donor->status = 'blocked';

    //updating information in both user and patient table
    $donor->save();

    return back()->with('danger', 'Activated sccessful!');
  }

  public function blockDonor()
  {
    

    $blocked_donor = Donation::where('status', 'inactive')
      ->orWhere('status', 'blocked')
      ->get();
    return view('admin.donation.blocked_donor', compact('blocked_donor'));
  }
}
