<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use Auth;

class BalanceController extends Controller
{
    public static function default (){
    	$pack = Balance::where('price',0)->first();
    	$data = ['user_id' => Auth::user()->id,
    			 'working' => 0,
    			 'available' => 0,
    			 'pending' => 0,
    			 'win' => 0
    			];
    	Subscription::create($data);
    }
}
