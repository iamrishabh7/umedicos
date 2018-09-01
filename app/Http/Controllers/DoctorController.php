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
use App\OperationalDay;
use Auth;
use DB;
class DoctorController extends Controller
{
	public function getEditProfile(){
		$data = array();
		$doc_specialization = array();
		$data['user'] = $user = User::where('id',Auth::user()->id)->with('doctor','doctor_clinic','doctor_specialization')->first();
		foreach($user->doctor_specialization as $doctor_specialization){
			array_push($doc_specialization,$doctor_specialization->specialization_id);
		}
		$data['doc_specialization'] = $doc_specialization;
		$data['specializations'] = Specialization::all();
		$data['doctor_clinic'] = $doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
		$data['clinic_images'] = ClinicImage::where('clinic_id',$doctor_clinic->id)->get();
		$data['operational_days1'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',1)->get();
		$data['operational_days2'] = OperationalDay::where('doctor_id', Auth::user()->id)->where('day_type',2)->get();
		return view('doctor.edit-profile',$data);
	}
	public function postEditProfile(Request $request)
	{
		$validator = \Validator::make($request->all(),
			array(
				'name' =>'required',
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
			$user = User::where('id',Auth::user()->id)->with('doctor')->first();
			$doctor = Doctor::where('doctor_id', Auth::user()->id)->first();
			$doctor_clinic = DoctorClinic::where('doctor_id', Auth::user()->id)->first();
			if($request->name){
				$user->name = $request->name;
			}
			if($request->profile_pic){
				$image = $request->file('profile_pic');
				$filename = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/images/doctors_images');
				$image->move($destinationPath, $filename);
				$doctor->profile_pic = url('/images/doctors_images').'/'.$filename;
			}
			if($request->registration_number){
				$doctor_clinic = DoctorClinic::where('doctor_id',\Auth::user()->id)->first();
				$doctor_clinic->registration_number = $request->registration_number;
				$doctor_clinic->save();
			}

			$doctor->pincode = $request->pincode;
			$doctor->city = $request->city;
			if($request->qualification){
				$doctor->qualification = $request->qualification;
			}
			if($request->consultation_fee){
				$doctor->consultation_fee = $request->consultation_fee;
			}
			if($request->primary_contact){
				$doctor->primary_contact = $request->primary_contact;
			}
			if($request->secondary_contact){
				$doctor->secondary_contact = $request->secondary_contact;
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

			if(count($request->operational_days1)) {
				DB::table('operational_days')->where('doctor_id', $user->id)->where('day_type', 1)->delete(); 
				for ($i=0; $i < count($request->operational_days1) ; $i++) { 
					$operational_days = new OperationalDay();
					$operational_days->doctor_id = $user->id;
					$operational_days->day_type = 1;
					$operational_days->day = $request->operational_days1[$i];
					$operational_days->from_time = $request->address1_timing_from[$i];
					$operational_days->to_time = $request->address1_timing_to[$i];
					$operational_days->save();
				}
			}
			if(count($request->operational_days2) > 0 && $request->operational_days2[0] != null) {
				DB::table('operational_days')->where('doctor_id', $user->id)->where('day_type', 2)->delete(); 
				for ($i=0; $i < count($request->operational_days2) ; $i++) { 
					$operational_days = new OperationalDay();
					$operational_days->doctor_id = $user->id;
					$operational_days->day_type = 2;
					$operational_days->day = $request->operational_days2[$i];
					$operational_days->from_time = $request->address2_timing_from[$i];
					$operational_days->to_time = $request->address2_timing_to[$i];
					$operational_days->save();
				}
			}

			if(count($request->clinic_images) > 0){
				// DB::table('clinic_images')->where('clinic_id', $doctor_clinic->id)->delete(); 
				for($i = 0; $i< count($request->clinic_images); $i++){
					$image = $request->file('clinic_images')[$i];
					$filename = time().rand().'.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/images/clinic_images');
					$image->move($destinationPath, $filename);

					$clinic_images = new ClinicImage();
					$clinic_images->clinic_id = $doctor_clinic->id;
					$clinic_images->image = url('/images/clinic_images').'/'.$filename;
					$clinic_images->save();
				}
				$user->is_profile_completed = 1;
			}
			$user->save();
			$doctor->save();
			if($user->save()){
				if($user->is_profile_completed){
					return redirect('/doctor/profile');
				}else{
					return redirect('/doctor/profile/edit');
				}
			}
		}
	}

	public function deleteClinicImage($image_id)
	{
		$response = array();
		$image = ClinicImage::where('id',$image_id)->first();
		if(is_null($image)){
			$response['flag'] = false;
			$response['message'] = 'Image Not found';
		}else{
			if($image->delete()){
				$response['flag'] = true;
				$response['message'] = 'Image Deleted Successfully';
			}else{
				$response['flag'] = false;
				$response['message'] = 'Something Went Wrong';
			}
		}
		return response()->json($response);
	}
	public function redeemCode(Request $request)
	{
		$response = array();
		$code = RedeemCodes::where('code',$request->code)->where('is_used',0)->first();
		if(is_null($code)){
			$response['flag'] = false;
			$response['message'] = 'Code is either used or invalid';
		}else{
			$code->doctor_id = Auth::user()->id;
			$code->is_used = 1;
			if($code->save()){
				$response['flag'] = true;
				if(isset($code['type']) && $code['type'] == REDEEM_TYPE_50)
					$response['message'] = 'Code Applied Successfully. Coupon discount is 50%';
				elseif(isset($code['type']) && $code['type'] == REDEEM_TYPE_20)
					$response['message'] = 'Code Applied Successfully. Coupon discount is 20%';
				else
					$response['message'] = 'Code Applied Successfully';
			}else{
				$response['flag'] = false;
				$response['message'] = 'Something Went Wrong';
			}
		}
		return response()->json($response);
	}
}
