<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    protected $fillable = [
        'use_id',
        'name',
        'address',
        'email',
        'bio',
        'website',
        'phone'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
