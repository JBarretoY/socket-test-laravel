<?php

namespace App\Http\Controllers;

use App\Mail\ValidAcount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SenderEmailController extends Controller
{
    public static function sendEmailValidRegister($nameUser,$id,$email){
        $link = url('validate-account/' . crypt($id . '-' . $email));
        Mail::to($email)->send(new ValidAcount($nameUser,$link));
    }
}
