<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\DoctorClinic;
use App\Patient;
use App\RedeemCodes;
use App\Specialization;
use Auth;
use Crypt;
use DB;

class AuthController extends Controller
{
	public function index()
	{
		$data = array();
		$data['specializations'] = Specialization::all();
		$data['doctors'] =  User::where('is_profile_completed',1)->where('role',1)->with('doctor')->get();
		return view('welcome',$data);
	}
	public function getLogin()
	{
		return view('login');
	}
	public function postLogin(Request $request)
	{
		$validator = \Validator::make(
			array(
				'email' =>$request->email,
				'password' =>$request->password,
			),
			array(
				'email' =>'required|email',
				'password' =>'required',
			)
		);
		if($validator->fails())
		{
			return redirect('/login')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$creds = ['email'=>$request->email,'password'=>$request->password];
			if(\Auth::attempt($creds)){
				if(\Auth::user()->is_active == 0){
					\Auth::logout();
					return redirect('/login')->with('error',"Your Account is Deactivated. Please Contact Admin");
				}else{
					return redirect('/login');
				}
			}
			else{
				return redirect('/login')->with('error',"Invalid Email or Password");
			}
		}
	}
	public function register(Request $request)
	{
		$response = array();
		$user = User::where('email',$request->reg_email)->first();
		if(!is_null($user)){
			$response['flag'] = false;
			$response['message'] = "email already exist";
		}else{

			$patient = Patient::where('primary_contact',$request->reg_mobile)->first();
			if(!is_null($patient)){
				$response['flag'] = false;
				$response['message'] = "Mobile Number Already Registered";
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
						if($doctor_clinic->save()){
							$value = rand();
							\DB::table('password_resets')->insert(['email' => $request->reg_email, 'type' => 'emailVerify', 'token' => $value]);

							$templateData['code'] = Crypt::encrypt($value);;
							$templateData['name'] = $user->name;
							$MailData = new \stdClass();
							$MailData->receiver_email = $request->reg_email;
							$MailData->receiver_name = $user->name;
							$MailData->subject = 'Welcome to DocApp';
							MailController::sendMail('emailVerify',$templateData,$MailData);
						}
					}else{
						$patient = new Patient;
						$patient->patient_id = $user->id;
						$patient->primary_contact = $request->reg_mobile;
						if($patient->save()){
							\DB::table('password_resets')->insert(['email' => $request->reg_email, 'type' => 'emailVerify', 'token' => $value]);
							$templateData['code'] = Crypt::encrypt($value);;
							$templateData['name'] = $user->name;
							$MailData = new \stdClass();
							$MailData->receiver_email = $request->reg_email;
							$MailData->receiver_name = $user->name;
							$MailData->subject = 'Welcome to DocApp';
							MailController::sendMail('emailVerify',$templateData,$MailData);
						}
					}
				}else{
					$response['flag'] = false;
					$response['message'] = "Failed To save";
				}
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
			if($user->is_active){
				if($user->role == 0){
					$response['flag'] = true;
					$response['next_url'] = url('/').'/admin/dashboard';
				} elseif($user->role == 1){
					$response['flag'] = true;
					if($user->is_profile_completed){
						$response['next_url'] = url('/').'/doctor/profile';
					}else{
						$response['next_url'] = url('/').'/doctor/profile/edit';
					}
				}else{
					$response['flag'] = true;
					$user->is_profile_completed = 1;
					$user->save();
					if($user->is_profile_completed){
						$response['next_url'] = url('/').'/patient/profile';
					}else{
						$response['next_url'] = url('/').'/patient/profile';
					}
				}
			}else{
				\Auth::logout();
				$response['flag'] = false;
				$response['message'] = "Acount is Deactivated. Please Contact Support.";
			}
		}
		else{
			$response['flag'] = false;
			$response['message'] = "Invalid Login credentials";
		}
		return response()->json($response);
	}

	public function postChangePassword(Request $request)
	{
		$response = array();
		$user = \App\User::find(\Auth::user()->id);
		$old_password = $request->old_password;
		$new_password = $request->new_password;
		if(\Hash::check($old_password, $user->getAuthPassword())){
			$user->password = \Hash::make($new_password);
			if($user->save()){
				$response['flag'] = true;
			}else{
				$response['flag'] = false;
				$response['error'] = "Something Went Wrong!";
			}
		}
		else{
			$response['flag'] = false;
			$response['error'] = "Invalid Old Password";
		}
		return response()->json($response);
	}

	public function sendOtp(Request $request) {
		$response = array();
		$mobile_number = $request->mobile_number;
		if ($mobile_number != "") {
			$otp = generatePIN();
			$curl = curl_init();
			$message = "Welcome To DocApp, This is your mobile verification otp ".$otp;
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=DOCAPP&route=4&mobiles=".$request->mobile_number."&authkey=209391AfYJrs2oH5acd846e&encrypt=1&country=91&message=".$message,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0,
			));

			$curl_response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			$user = User::where('id',Auth::user()->id)->first();
			$user->otp = $otp;
			if($user->save()){
				$response['flag'] = true;	
			}else{
				$response['flag'] = false;	
				$response['flag'] = "something went wrong";	
			}
		} else {
			$response['flag'] = false;
			$response['message'] = "Please Enter Mobile Number";
		}
		return response()->json($response);
	}
	public function verifyOtp(Request $request) {
		$response = array();
		if($request->otp !=""){
			$pin = $request->otp;
			$user = User::where('id',Auth::user()->id)->where('otp',$request->otp)->first();
			if(!is_null($user)){
				$user->is_mobile_verified = 1;
				$user->otp = null;
				if($user->save()){
					$code_array = array();
					$ifExist = \App\RedeemCodes::where('user_id',Auth::user()->id)->get();
					if(count($ifExist) == 0){
						for($i=0;$i<4;$i++){	
							$redeem_codes = new \App\RedeemCodes();
							$name_array = explode(' ',$user->name);
							$redeem_codes->code = strtoupper(substr($user->name,0,strlen($name_array[0])).randomstring(4));
							$redeem_codes->user_id = $user->id;
							$redeem_codes->save();
							array_push($code_array,$redeem_codes->code);
						}
						$codes = implode(',',$code_array);
						$message = "Welcome To DocApp. Find you free coupon codes below: ".$codes;
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=DOCAPP&route=4&mobiles=".$user->patient->primary_contact."&authkey=209391AfYJrs2oH5acd846e&encrypt=1&country=91&message=".$message,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 30,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "GET",
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
						));

						$curl_response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);
					}
					$response['flag'] = true;
					$response['message'] = "Your Mobile Number Has Been Verified.";
				}else{
					$response['message'] = "Something went wrong";
					$response['flag'] = false;
				}
			}else{
				$response['message'] = "Your Verification Pin is Incorrect.";
				$response['flag'] = false;
			}
		}else{
			$response['message'] = "Your Verification Pin is Incorrect.";
			$response['flag'] = false;
		}
		return response()->json($response);
	}

	public function email_activation($token){
		$value = Crypt::decrypt($token);
		$resetData = DB::table('password_resets')->where('type','emailVerify')->where('token',$value)->first();
		if(count($resetData) == 1){
			DB::table('users')->where('email',$resetData->email)->update(['is_active'=> 1 ]);
			DB::table('password_resets')->where('email',$resetData->email)->delete();
			return redirect('/login')->with('success','Email Verified Successfully !');
		}else{			
			return redirect('/login')->with('message','Token invalid or Expired !');			
		}

	}

	public function logout()
	{
		Auth::logout();
		return redirect('/');
	}

}
