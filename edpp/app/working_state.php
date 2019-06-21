<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class working_state extends Model
{
    //
    protected $fillable = [
        'hospital_id', 'day_id', 'payment',
    ];

    public function doctor() {
       return $this->belongsTo(Doctor::class);
    }

    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }

    public function day() {
    return $this->belongsTo(Day::class);
    }
}
