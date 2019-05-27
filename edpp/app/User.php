<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {

        $role = 'N/A';

        if ($this->role)
            $role = $this->role->name;

        if ($role == 'admin')
            return true;
        else
            return false;
    }

    public function isHospital()
    {
        $role = 'N/A';

        if ($this->role)
            $role = $this->role->name;

        if ($role == 'hospital')
            return true;
        else
            return false;
    }
}
