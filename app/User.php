<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function doctor()
    {
        return $this->hasOne('\App\Doctor','doctor_id');
    }   
    public function doctor_clinic()
    {
        return $this->hasOne('\App\DoctorClinic','doctor_id');
    }
    public function doctor_specialization()
    {
        return $this->hasMany('\App\DoctorSpecialization','doctor_id');
    }
}
