<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use App\Package;
use Auth;
use Carbon\Carbon;

class SusbcriptionController extends Controller
{
    public static function default (){
    	$pack = Package::where('price',0)->first();
    	$data = ['user_id' => Auth::user()->id,
    			 'package_id' => $pack->id,
    			 'num_projects_available' => $pack->num_project,
    			 'status' => 1,
    			 'renewal_date' => Carbon::now()->format('Y-m-d'),
    			 'last_renewal_date' => Carbon::now()->format('Y-m-d')
    			];
    	Subscription::create($data);
    }
}
