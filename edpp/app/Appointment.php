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
}
