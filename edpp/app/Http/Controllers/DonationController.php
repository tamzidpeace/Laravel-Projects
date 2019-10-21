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

    public function donorSearch(Request $request)
    {

        $this->validate($request, ['search' => 'required']);

        $search = $request->search;

        $search = strtolower($search);

        if ($search == 'a+')
            $blood_group_id = 1;
        elseif ($search == 'a-')
            $blood_group_id = 2;
        elseif ($search == 'b+')
            $blood_group_id = 3;
        elseif ($search == 'b-')
            $blood_group_id = 4;
        elseif ($search == 'o+')
            $blood_group_id = 5;
        elseif ($search == 'o-')
            $blood_group_id = 6;
        elseif ($search == 'ab+')
            $blood_group_id = 7;
        elseif ($search == 'ab-')
            $blood_group_id = 8;
        else {
            $blood_group_id = $search;
        }
        
        $donors = Donation::where('blood_group_id', 'LIKE', '%' . $blood_group_id . '%')
        ->orWhere('address', 'LIKE', '%' . $blood_group_id . '%')
        ->get();

        

        
        if (count($donors) > 0)
            return view('donation.donor_search', compact('donors'));
        else
            return view('donation.donor_search', compact('donors'));
        
    }
}
