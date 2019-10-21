<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //

    protected $fillable = [
            'user_id',
            'role_id',
            'status',
            'name',
            'email',
            'address',
            'photo',
    ];

    public function role()
    {
        return $this->belongsTo(App::Role);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // setting up many to many relationship
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class)->withPivot('status');
    }

    public function pendingDoctors()
    {
        return $this->belongsToMany(Doctor::class)->wherePivot('status', 'pending')->withPivot('status');
    }

    public function registeredDoctors()
    {
        return $this->belongsToMany(Doctor::class)->wherePivot('status', 'registered')->withPivot('status');
    }

    public function blockedDoctors()
    {
        return $this->belongsToMany(Doctor::class)->wherePivot('status', 'blocked')->withPivot('status');
    }
}
