<?php
use App\Notification;

function makeNotification($user_id,$message){
	$data = ['user_id'=>$user_id,
			 'message'=>$message,
			 'read'=>false];
	return Notification::create($data);
}

function encryptMsg($string){
    return encrypt($string);
}

function desEncrypt($msgEncrypt){
    return decrypt($msgEncrypt);
}
