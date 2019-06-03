<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //

    protected $fillable = [
        'user_id',
        'role_id',
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];

    public function role()
    {
        return $this->belongsTo(App::Role);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospitals() {
        return $this->belongsToMany(Hospital::class)->wherePivot('status', 'pending')->withPivot('status');
    }
}
