<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\DoctorClinic;
use App\ClinicImage;
use Auth;
class HomeController extends Controller
{
	public function search(Request $request)
	{
		$data = array();
		if(!isset($request->address) || $request->address == ""){
			$data['doctors'] = array();	
		}else{
			$data['doctors'] = Doctor::where('address1', 'like', '%' . $request->address . '%')->orWhere('address2', 'like', '%' . $request->address . '%')->with('user','clinic')->get();
		}
		return view('search-result',$data);
	}
	public function doctorPublieProfile($id)
	{
		$data = array();
		$user =  User::where('id',$id)->where('is_profile_completed',1)->where('role',1)->with('doctor','doctor_clinic','doctor_specialization')->first();
		if(is_null($user)){
			$data['doctors'] = array();
			return view('search-result',$data);
		}else{
			$data['user'] = $user;
			$doctor_clinic = DoctorClinic::where('doctor_id', $id)->first();
			$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();
			return view('profile',$data);
		}
	}
	public function doctorProfile()
	{
		$data = array();
		$data['user'] = User::where('id',Auth::user()->id)->with('doctor','doctor_clinic','doctor_specialization')->first();
		$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
		$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();

		return view('doctor.profile',$data);
	}


}
