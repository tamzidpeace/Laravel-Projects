<?php

namespace App\Http\Controllers;

use App\HospitalBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use PDF;

class NotificationController extends Controller
{
    //

    public function patientNotification()
    {

        $user = Auth::user();

        $notifications = Notification::where('receiver_user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('notification.patient_noti', compact('notifications'));
    }

    public function patientNotificationDetails($id)
    {

        $noti = Notification::find($id);

        $noti->status = "seen";
        $noti->save();

        return view('notification.patient_noti_details', compact('noti'));
    }

    public function downloadForm($id)
    {

        $noti = Notification::find($id);

        $pdf = PDF::loadView('notification.pdf.booking_form', compact( 'noti'));
        return $pdf->stream('invoice.pdf');
        
    }
}
