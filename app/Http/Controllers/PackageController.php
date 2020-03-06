<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use DB;

class PackageController extends Controller
{
    public function store(Request $request){
        DB::beginTransaction();
    	$data = ['name'        		=>  $request->input('name'),
                'price'				=>  $request->input('price'),
                'num_project'		=>  $request->input('num_project'),
                'description'		=>  $request->input('description'),
                'time_publish'		=>  $request->input('time_publish'),
                'time_num_roject'	=>  $request->input('time_num_roject')
                ];
        
        $store = Package::create($data); 
        if($store){
            DB::commit();
			return response()->json(['store' => $store, 'code' => '201'],201);
        }else{
            DB::rollBack();
			return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }
    }

    public function show($id){
    	$ser = Package::where('id',$id)->first();
    	return response()->json(['data' => $ser,'code' => '200'],200);
    }

    public function index(){
    	$data = Package::all();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }
}
