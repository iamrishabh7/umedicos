<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\DoctorClinic;
use App\ClinicImage;
use App\DoctorSpecialization;
use App\DoctorAddress;
use App\Specialization;
use App\RedeemCodes;
use Auth;
use DB;


class PatientController extends Controller
{
	function getProfile()
	{
		$data = array();
		$data['user'] = $user = User::where('id',Auth::user()->id)->with('patient')->first();
		return view('patient.profile',$data);
	}

	
}
