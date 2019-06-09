<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Doctor extends Model
{
    //

    use Searchable;

    // public function searchableAs()
    // {
    //     return 'name';
    // }

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

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class)->withPivot('status');
    }

    public function specialist() {
        return $this->belongsTo(Specialist::class);
    }
}
