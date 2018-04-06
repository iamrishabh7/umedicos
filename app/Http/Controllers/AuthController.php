<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\Patient;
use Auth;
class AuthController extends Controller
{
	public function index()
	{
		return view('welcome');
	}
	public function register(Request $request)
	{
		$response = array();
		$user = User::where('email',$request->reg_email)->first();
		if(!is_null($user)){
			$response['flag'] = false;
			$response['message'] = "email already exist";
		}else{

			$user = new User();
			$user->name = $request->name;
			$user->email = $request->reg_email;
			$user->password = bcrypt($request->reg_password);
			$user->role = $request->reg_role;
			if($user->save()){
				$response['flag'] = true;
				$response['message'] = "Registered Successfully";
				if($request->reg_role == 1){
					$doctor = new Doctor;
					$doctor->doctor_id = $user->id;
					$doctor->primary_contact = $request->reg_mobile;
					$doctor->save();

					$doctor_clinic = new DoctorClinic;
					$doctor_clinic->doctor_id = $user->id;
					$doctor_clinic->save();
					
				}else{
					$patient = new Patient;
					$patient->patient_id = $user->id;
					$patient->primary_contact = $request->reg_mobile;
					$patient->save();
				}
			}else{
				$response['flag'] = false;
				$response['message'] = "Failed To save";
			}
		}
		return response()->json($response);
	}
	public function login(Request $request)
	{
		$response = array();	
		$creds = ['email'=>$request->login_email,'password'=>$request->login_password];
		if(\Auth::attempt($creds)){
			$user = \Auth::user();
			if($user->role == 1){
				$response['flag'] = true;
				if($user->is_profile_completed){
					$response['next_url'] = url('/').'/doctor/profile';
				}else{
					$response['next_url'] = url('/').'/doctor/profile/edit';
				}
			}else{
				$response['flag'] = true;
				if($user->is_profile_completed){
					$response['next_url'] = url('/').'/patient/profile';
				}else{
					$response['next_url'] = url('/').'/patient/profile/edit';
				}
			}
		}
		else{
			$response['flag'] = false;
			$response['flag'] = "Invalid Login credentials";
		}
		return response()->json($response);
	}
	public function logout()
	{
		Auth::logout();
		return redirect('/');
	}

}
