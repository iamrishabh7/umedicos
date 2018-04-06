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
	public function doctorPublieProfile()
	{
		return view('profile');
	}
	public function doctorProfile()
	{
		$data = array();
		$data['user'] = User::find(Auth::user()->id)->with('doctor','doctor_clinic','doctor_specialization')->first();
		$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
		$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();

		return view('doctor.profile',$data);
	}


}
