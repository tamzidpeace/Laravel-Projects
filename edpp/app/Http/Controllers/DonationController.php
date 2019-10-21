<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BloodGroup;
use App\Donation;

use DB;
class DonationController extends Controller
{
    public function allDonors()
    {
        $donors = Donation::all();
        return view('admin.donation.all_donors', compact('donors'));
    }
    
}
