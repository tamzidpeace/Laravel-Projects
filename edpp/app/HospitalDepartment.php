<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalDepartment extends Model
{
    //

    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }
}
