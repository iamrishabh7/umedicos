<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\DoctorClinic;
use App\ClinicImage;
use App\DoctorSpecialization;
use App\OperationalDay;
use App\RedeemCodes;
use Auth;
class HomeController extends Controller
{
	public function search(Request $request)
	{
		$data = array();
		if(!empty($request->address) && empty($request->specialization)){
			$doctorsByAddess = Doctor::where('city', 'like', '%' . $request->address . '%')->with('user','clinic','spacialization')->get();
			$data['doctors'] = $doctorsByAddess;	
		}
		elseif(empty($request->address) && !empty($request->specialization)){
			$doctorsByAddess= Doctor::where('city', 'like', '%' . $request->address . '%')->with('user','clinic','spacialization')->get();
			$doctors = array();
			foreach ($doctorsByAddess as $user) {
				$doctorsBySpecialization = DoctorSpecialization::where('doctor_id', $user->doctor_id)->where('specialization_id', $request->specialization)->first();
				if(!is_null($doctorsBySpecialization)){
					array_push($doctors,$user);
				}
			}
			$data['doctors'] = $doctors;	
		}elseif(!empty($request->address) && !empty($request->specialization)){
			$doctorsByAddess= Doctor::where('city', $request->address)->with('user','clinic','spacialization')->get();
			$doctors = array();
			foreach ($doctorsByAddess as $user) {
				$doctorsBySpecialization = DoctorSpecialization::where('doctor_id', $user->doctor_id)->where('specialization_id', $request->specialization)->first();
				if(!is_null($doctorsBySpecialization)){
					array_push($doctors,$user);
				}else{
					array_push($doctors,$user);	
				}
			}
			$data['doctors'] = $doctors;	
		}else{
			$data['doctors'] = array();	
			
		}
		return view('search-result',$data);
	}	

	public function getResultByLocation($location)
	{
		$response = array();
		$spacialization_ids = array();
		$spacializations = array();
		$doctors = array();
		$doctorsByAddess = Doctor::where('city',$location)->with('user','clinic','spacialization')->get();
		foreach ($doctorsByAddess as $doctor) {
			$doctor_arr = array();
			$doctor_arr['name'] = getUserById($doctor->doctor_id)->name;
			$doctor_arr['id'] = $doctor->doctor_id;
			$doctor_arr['profile_pic'] = $doctor->profile_pic;
			array_push($doctors,$doctor_arr);
			foreach ($doctor->spacialization as $spacialization) {
				array_push($spacialization_ids,$spacialization->specialization_id);
			}
		}
		foreach (array_unique($spacialization_ids) as $spacialization_id) {
			$spacialization_arr = array();
			$spacialization_arr['name'] = getSpecializationById($spacialization_id)->name;
			$spacialization_arr['id'] = $spacialization_id;
			array_push($spacializations,$spacialization_arr);
		}
		$response['spacializations'] = $spacializations;
		$response['doctors'] = $doctors;
		return response()->json($response);
	}

	public function getCities($keyword){
		$response = array();
		$cities = array();
		$doctorsByCity= Doctor::where('city', 'like', '%' . $keyword . '%')->get();
		foreach ($doctorsByCity as $doctorByCity) {
			array_push($cities,$doctorByCity->city);
		}
		if(count($cities) > 0){
			$response['flag'] = true;
			$response['cities'] = $cities;
		}else{
			$response['flag'] = false;
		}
		return response()->json($response);
	}
	public function doctorPublicProfile($id)
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
			$data['operational_days1'] = OperationalDay::where('doctor_id', $id)->where('day_type',1)->get();
			$data['operational_days2'] = OperationalDay::where('doctor_id', $id)->where('day_type',2)->get();
			$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();
			$data['redeemed_patients'] = RedeemCodes::where('doctor_id', $id)->get();
			$data['doctor_clinic'] = $doctor_clinic;
			return view('profile',$data);
		}
	}
	public function doctorProfile()
	{
		$data = array();
		$data['user'] = User::where('id',Auth::user()->id)->where('is_active',1)->with('doctor','doctor_clinic','doctor_specialization')->first();
		$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
		$data['operational_days1'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',1)->get();
		$data['operational_days2'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',2)->get();
		$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();
		$data['redeemed_patients'] = RedeemCodes::where('doctor_id', Auth::user()->id)->get();
		$data['doctor_clinic'] = $doctor_clinic;
		return view('doctor.profile',$data);
	}


}
