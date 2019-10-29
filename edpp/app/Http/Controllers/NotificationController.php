<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function patientNotification() {
        
        $user = Auth::user();

        $notifications = Notification::where('receiver_user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        return view('notification.patient_noti', compact('notifications'));
    }

    public function patientNotificationDetails($id) {

        $noti = Notification::find($id);

        $noti->status = "seen";
        $noti->save();

        return view('notification.patient_noti_details', compact('noti'));
    }
}
