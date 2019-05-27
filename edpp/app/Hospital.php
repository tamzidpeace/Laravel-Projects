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
}
