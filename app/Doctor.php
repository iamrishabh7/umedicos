<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	public function user(){
		return $this->belongsTo('App\User','doctor_id');
	}
	public function spacialization(){
		return $this->hasMany('App\DoctorSpecialization','doctor_id','doctor_id');
	}
	public function clinic(){
		return $this->hasOne('App\DoctorClinic','doctor_id','doctor_id');
	}
}
