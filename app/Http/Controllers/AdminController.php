<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DoctorClinic;
use App\OperationalDay;
use App\RedeemCodes;
use App\ClinicImage;
use Auth;

class AdminController extends Controller
{
	public function dashboard()
	{
		return view('admin.dashboard');
	}

	public function doctors(Request $request)
	{
		if(isset($request->type) && $request->type == "active"){
			$doctors = \App\User::where('role','=',1)->where('is_active','=',1)->with('doctor')->orderBy('id','DESC')->get();
		}elseif(isset($request->type) && $request->type == "inactive"){
			$doctors = \App\User::where('role','=',1)->where('is_active','=',0)->with('doctor')->orderBy('id','DESC')->get();
		}else{
			$doctors = \App\User::where('role','=',1)->with('doctor')->orderBy('id','DESC')->get();
		}
		$data['doctors'] = $doctors;
		return view('admin.doctors.index',$data);
	} 

	public function doctorProfile()
	{
		$data = array();
		$data['user'] = User::where('id',Auth::user()->id)->with('doctor','doctor_clinic','doctor_specialization')->first();
		$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
		$data['operational_days1'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',1)->get();
		$data['operational_days2'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',2)->get();
		$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();
		$data['redeemed_patients'] = RedeemCodes::where('doctor_id', Auth::user()->id)->get();
		$data['doctor_clinic'] = $doctor_clinic;
		return view('admin.doctors.profile',$data);
	}

	
	public function activateDoctor($id)
	{
		$doctor = \App\User::where('id',$id)->first();
		if(is_null($doctor)){
			return redirect('/admin/doctors')->with('error','doctor Not Found');
		}else{
			$doctor->is_active = 1;
			if($doctor->save()){
				return redirect('/admin/doctors')->with('success','doctor Activated Successfully.');
			}else{
				return redirect('/admin/doctors')->with('error','Something Went Wrong');
			}
		}
	}
	public function deactivateDoctor($id)
	{
		$doctor = \App\User::where('id',$id)->first();
		if(is_null($doctor)){
			return redirect('/admin/doctors')->with('error','doctor Not Found');
		}else{
			$doctor->is_active = 0;
			if($doctor->save()){
				return redirect('/admin/doctors')->with('success','doctor Decctivated Successfully.');
			}else{
				return redirect('/admin/doctors')->with('error','Something Went Wrong');
			}
		}
	}
	public function deleteDoctor($id)
	{
		$doctor = \App\User::find($id);
		if(is_null($doctor)){
			return redirect('/admin/doctors')->with('error','doctor Not Found');
		}else{
			$user_id = $doctor->user_id;
			if($doctor->delete()){
				$user = \App\User::find($user_id);
				if(!is_null($user)){
					$user->delete();
				}
				return redirect('/admin/doctors')->with('success','doctor Removed Successfully.');
			}else{
				return redirect('/admin/doctors')->with('error','Something Went Wrong');
			}
		}
	}

	public function patients(Request $request)
	{
		if(isset($request->type) && $request->type == "active"){
			$patients = \App\User::where('role','=',2)->where('is_active','=',1)->with('patient')->orderBy('id','DESC')->get();
		}elseif(isset($request->type) && $request->type == "inactive"){
			$patients = \App\User::where('role','=',2)->where('is_active','=',0)->with('patient')->orderBy('id','DESC')->get();
		}else{
			$patients = \App\User::where('role','=',2)->with('patient')->orderBy('id','DESC')->get();
		}
		$data['patients'] = $patients;
		
		return view('admin.patients.index',$data);
	} 

	public function patientProfile()
	{
		$data = array();
		$data['user'] = User::where('id',Auth::user()->id)->with('doctor','doctor_clinic','doctor_specialization')->first();
		$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
		$data['operational_days1'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',1)->get();
		$data['operational_days2'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',2)->get();
		$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();
		$data['redeemed_patients'] = RedeemCodes::where('doctor_id', Auth::user()->id)->get();
		$data['doctor_clinic'] = $doctor_clinic;
		return view('admin.patients.profile',$data);
	}

	
	public function activatePatient($id)
	{
		$patient = \App\User::where('id',$id)->first();
		if(is_null($patient)){
			return redirect('/admin/patients')->with('error','patient Not Found');
		}else{
			$patient->is_active = 1;
			if($patient->save()){
				return redirect('/admin/patients')->with('success','patient Activated Successfully.');
			}else{
				return redirect('/admin/patients')->with('error','Something Went Wrong');
			}
		}
	}
	public function deactivatePatient($id)
	{
		$doctor = \App\User::where('id',$id)->first();
		if(is_null($doctor)){
			return redirect('/admin/doctors')->with('error','doctor Not Found');
		}else{
			$doctor->is_active = 0;
			if($doctor->save()){
				return redirect('/admin/doctors')->with('success','doctor Decctivated Successfully.');
			}else{
				return redirect('/admin/doctors')->with('error','Something Went Wrong');
			}
		}
	}
	public function deletePatient($id)
	{
		$patient = \App\User::find($id);
		if(is_null($patient)){
			return redirect('/admin/patients')->with('error','patient Not Found');
		}else{
			$user_id = $patient->user_id;
			if($patient->delete()){
				$user = \App\User::find($user_id);
				if(!is_null($user)){
					$user->delete();
				}
				return redirect('/admin/patients')->with('success','patient Removed Successfully.');
			}else{
				return redirect('/admin/doctors')->with('error','Something Went Wrong');
			}
		}
	}

}
