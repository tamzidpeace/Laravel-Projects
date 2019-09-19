<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalFeedback extends Model
{
    //
    protected $fillable = [
        'feedback',
    ];

    public function hospital()
    {
        return $this->belongsTo(App::Hospital);
    }
}
