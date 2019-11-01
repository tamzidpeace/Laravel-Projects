<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'name',
        'age',
        'sex',
        'blood_group',
        'email',
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
