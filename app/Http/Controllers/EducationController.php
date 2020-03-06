<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EducationRequest;
use App\Education;
use Auth;

class EducationController extends Controller
{
    public function store(EducationRequest $request){
    	if($request->input('date_to') > $request->input('date_from')){
            $data = ['name'         =>  $request->input('name'),
                    'institution'   =>  $request->input('institution'),
                    'date_from'     =>  $request->input('date_from'),
                    'date_to'       =>  $request->input('date_to'),
                    'description'   =>  $request->input('description'),
                    'user_id'       =>  Auth::user()->id
                    ];
            $store = Education::create($data); 
            if($store){
                return response()->json(['store' => $store, 'code' => '201'],201);
            }
            else
                return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }else
            return response()->json(['error'=>'Fechas incorrectas','code' => '400'],400);
    }

    public function update(EducationRequest $request){
        $cer = Education::find($request->input('id'));
        if(!is_null($cer)){
            $req = $request->all();
            $cer->update($req);
	        return response()->json(['data' => $cer->fresh(),'code' => '200'],200);
        }else{
    		return response()->json(['error' => 'not found','code' => '400'],404);
        }
    }

    public function show($id){
    	$ser = Education::where('id',$id)->first();
    	return response()->json(['data' => $ser,'code' => '200'],200);
    }

    public function index(){
    	$data = Education::where('user_id',Auth::user()->id)->get();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function destroy ($id){
    	$cer = Education::find($id);
        if(!is_null($cer)){
            $cer->delete();
            return response()->json(['data'=>'Deleted','code'=>'200'],200);
        }else
            return response()->json(['error' => 'not found','code' => '400'],404);
    }
}
