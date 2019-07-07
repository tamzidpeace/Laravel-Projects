<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    //
    protected $fillable = ['name'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
