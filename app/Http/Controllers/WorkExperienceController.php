<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkExpRequest;
use Illuminate\Http\Request;
use App\WorkExperience;
use Auth;

class WorkExperienceController extends Controller
{
    public function store(WorkExpRequest $request){

        $data = ['name'         =>  $request->input('name'),
                'company_name'  =>  $request->input('company_name'),
                'date_from'     =>  $request->input('date_from'),
                'date_to'       =>  $request->input('date_to'),
                'description'   =>  $request->input('description'),
                'at_present'    =>  boolval($request->input('at_present')),
                'user_id'       =>  Auth::user()->id
                ];
        $store = WorkExperience::create($data);
        if($store){
            return response()->json(['store' => $store, 'code' => '201'],201);
        }
        else
            return response()->json(['error'=>'Bad Request','code' => '400'],400);

    }

    public function update(WorkExpRequest $request){
        $cer = WorkExperience::find($request->input('id'));
        if(!is_null($cer)){
            $req = $request->all();
            $cer->update($req);
            return response()->json(['data' => $cer->fresh(),'code' => '200'],200);
        }else{
            return response()->json(['error' => 'not found','code' => '404'],404);
        }
    }

    public function show($id){
    	$ser = WorkExperience::where('id',$id)->first();
    	return response()->json(['data' => $ser,'code' => '200'],200);
    }

    public function index(){
    	$data = WorkExperience::where('user_id',Auth::user()->id)->get();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function destroy ($id){
    	$cer = WorkExperience::find($id);
        if(!is_null($cer)){
            $cer->delete();
            return response()->json(['data'=>'Deleted','code'=>'200'],200);
        }else
            return response()->json(['error' => 'not found','code' => '404'],404);
    }
}
