<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //

    protected $fillable = [
        'user_id',
        'role_id',
        'blood_group_id',
        'name',
        'age',
        'sex',
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

    public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
