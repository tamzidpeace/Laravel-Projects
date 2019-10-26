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
        'name', 'email', 'password','is_activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // start of middleware functions
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

    public function isDoctor()
    {
        $role = 'N/A';

        if ($this->role)
            $role = $this->role->name;

        if ($role == 'doctor')
            return true;
        else
            return false;
    }

    public function isPatient()
    {
        $role = 'N/A';

        if ($this->role)
            $role = $this->role->name;

        if ($role == 'patient')
            return true;
        else
            return false;
    }

    public function isNewUser()
    {

        if (!$this->role)
            return true;
        else
            return false;
    }
    // end of middleware functions


    
    //others functions
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function hospital()
    {
        return $this->hasOne(Hospital::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
