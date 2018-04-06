<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	public function user(){
		return $this->belongsTo('App\User','doctor_id');
	}
	public function clinic(){
		return $this->hasOne('App\DoctorClinic','doctor_id');
	}
}
