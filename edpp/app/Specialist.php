<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    //
    protected $fillable = ['name'];

    public function doctors() {
        return $this->hasMany(Doctor::class);
    }
}
