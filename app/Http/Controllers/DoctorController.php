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
use Auth;
use DB;
class DoctorController extends Controller
{
	public function getEditProfile(){
		$data = array();
		$data['user'] = User::find(Auth::user()->id)->with('doctor')->first();
		$data['specializations'] = Specialization::all();
		return view('doctor.edit-profile',$data);
	}
	public function postEditProfile(Request $request)
	{
		$validator = \Validator::make($request->all(),
			array(
				'name' =>'required',
				'profile_pic' =>'required|image',
				'primary_contact' =>'required',
				'address1' =>'required',
			)
		);
		if($validator->fails())
		{
			return redirect('/doctor/profile/edit')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$user = User::find(Auth::user()->id)->with('doctor')->first();
			$doctor = Doctor::where('doctor_id', Auth::user()->id)->first();
			$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
			if($request->name){
				$user->name = $request->name;
			}
			if($request->primary_contact){
				$doctor->primary_contact = $request->primary_contact;
			}
			if($request->address1){
				$doctor->address1 = $request->address1;
			}
			if($request->address2){
				$doctor->address2 = $request->address2;
			}

			if(count($request->spacialization) > 0){
				DB::table('doctor_specializations')->where('doctor_id', $user->id)->delete(); 
				for($i = 0; $i< count($request->spacialization); $i++){
					$doctor_specialization = new DoctorSpecialization();
					$doctor_specialization->doctor_id = $user->id;
					$doctor_specialization->specialization_id = $request->spacialization[$i];
					$doctor_specialization->save();
				}
			}
			if(count($request->clinic_images) > 1){
				DB::table('clinic_images')->where('clinic_id', $doctor_clinic->id)->delete(); 
				for($i = 0; $i< count($request->clinic_images); $i++){
					$image = $request->file('clinic_images')[$i];
					$filename = time().'.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/images/clinic_images');
					$image->move($destinationPath, $filename);

					$clinic_images = new ClinicImage();
					$clinic_images->clinic_id = $doctor_clinic->id;
					$clinic_images->image = $filename;
					$clinic_images->save();
				}
				$user->is_profile_completed = 1;
			}
			$user->save();
			$doctor->save();
			dd($request->all());
		}
	}
}
