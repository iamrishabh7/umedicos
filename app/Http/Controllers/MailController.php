<?php
namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
class MailController extends Controller
{
	/**
     *
     * @param  string   $mailTemplate
     * @param  array   $templateData
     * @param  array   $MailData
     * @param  string  $subject
     *
     */
	public static function sendMail($mailTemplate,$templateData,$MailData)
	{
		Mail::send('emails.'.$mailTemplate, $templateData, function ($message) use ($MailData) {
			$message->from('noreply@docapp.com', 'docapp.com');
			$message->to($MailData->receiver_email, $MailData->receiver_name);
			$message->subject($MailData->subject);
		});
	}
}