<?php 
function getUserById($spacialization){
	$user = \App\User::find($user_id);
	return $user;
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
	?>