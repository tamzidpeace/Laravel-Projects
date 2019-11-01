<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalBooking extends Model
{
    //

    public function department() {
        return $this->belongsTo(HospitalDepartment::class, 'department_id');
    }

    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
