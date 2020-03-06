<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
    public static function paymentPaypal($params){
        $pay = Payment::create($params);

        return !is_null($pay) ? $pay : false;
    }
}
