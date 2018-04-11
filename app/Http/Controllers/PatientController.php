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
use App\RedeemCode;
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
	function getEditProfile()
	{
		$data = array();
		$data['user'] = $user = User::where('id',Auth::user()->id)->with('patient','redeem_codes')->first();
		return view('patient.edit-profile',$data);
	}
	function postEditProfile(Request $request)
	{
		$validator = \Validator::make($request->all(),
			array(
				'name' =>'required',
			)
		);
		if($validator->fails())
		{
			return redirect('/patient/profile/edit')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$user = User::where('id',$request->id)->first();
			$user->name = $request->name;
			if($user->save()){
				return redirect('/patient/profile/edit')->with('success',"Profile updated Successfully");
			}
		}
	}


}
