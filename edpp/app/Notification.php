<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //

    public function booking() {
        return $this->belongsTo(HospitalBooking::class, 'file');
    }

    
}
