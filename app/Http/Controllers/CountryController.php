<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public static function index(){
        $data = Country::all();
        return response()->json(['data'=>$data,'code'=>'200'],200);
    }
}
