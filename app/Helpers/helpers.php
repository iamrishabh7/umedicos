<?php 
function getUserById($user_id){
	$user = \App\User::find($user_id);
	return $user;
}
function couponUsedByDoctor($doctor_id){
	$coupons = \App\RedeemCodes::where('doctor_id',$doctor_id)->where('is_used',1)->get();
	return $coupons;
}
function getSpecializationById($specialization){
	$specialization = \App\Specialization::find($specialization);
	return $specialization;
}

function randomstring($len)
{
	$string = "";
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	for($i=0;$i<$len;$i++)
		$string.=substr($chars,rand(0,strlen($chars)),1);
	return $string;
}

function generatePIN($digits = 4){
		$i = 0; //counter
		$pin = ""; //our default pin is blank.
		while($i < $digits){
			//generate a random number between 0 and 9.
			$pin .= mt_rand(0, 9);
			$i++;
		}
		return $pin;
	}



	function getAttendanceBydate($mydate,$employee_id){
		$attendance = \App\AttendanceData::where('attendance_date',$mydate)->where('employee_id',$employee_id)->first(); 
		if(count($attendance) == 1){
			return $attendance->status;   
		}else{
			return false;   
		}   


	}

	function isAttendanceDone($mydate,$employee_id){
		$attendance = \App\AttendanceData::where('attendance_date',$mydate)->where('employee_id',$employee_id)->first(); 
		if(count($attendance) == 1){
			return true;   
		}else{
			return false;   
		}   


	}


	function getUnreadNotificationsById($receiver_id){
		$notifications = \App\Notification::where('receiver_id',$receiver_id)->where('is_read',0)->orderBy('id','DESC')->get();
		return count($notifications);
	}
	function getNotificationsById($receiver_id){
		$notifications = \App\Notification::where('receiver_id',$receiver_id)->where('is_read',0)->orderBy('id','DESC')->get();
		return $notifications;
	}
	function calculateTimeSpan($date){
		$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);

		$months = floor($seconds / (3600*24*30));
		$day = floor($seconds / (3600*24));
		$hours = floor($seconds / 3600);
		$mins = floor(($seconds - ($hours*3600)) / 60);
		$secs = floor($seconds % 60);

		if($seconds < 60){
			$time = $secs." sec ago";
		}
		else if($seconds < 60*60 ){
			$time = $mins." min ago";
		}
		else if($seconds < 24*60*60){
			$time = $hours." hrs ago";
		}
		else if($seconds < 24*60*60*30){
			$time = $day." day ago";
		}
		else{
			$time = $months." month ago";
		}
		return $time;
	}

	function setActive($path)
	{
		return Request::is($path) ? 'open' : '1';
	}
	?>