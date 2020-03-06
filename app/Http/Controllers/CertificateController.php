<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use DB;
use Auth;
use App\Http\Requests\CertificateRequest;

class CertificateController extends Controller
{
    public function store(CertificateRequest $request){
        if($request->input('date_to') > $request->input('date_from')){
            DB::beginTransaction();
            $data = ['name'         =>  $request->input('name'),
                    'granted_by'    =>  $request->input('granted_by'),
                    'date_from'     =>  $request->input('date_from'),
                    'date_to'       =>  $request->input('date_to'),
                    'description'   =>  $request->input('description'),
                    'user_id'       =>  Auth::user()->id
                    ];
            $certif = Certificate::create($data); 
            if($certif){
                DB::commit();
                return response()->json(['store' => $certif, 'code' => '201'],201);
            }else{
                DB::rollBack();
                return response()->json(['error'=>'Bad Request','code' => '400'],400);
            }
        }else
            return response()->json(['error'=>'Fechas incorrectas','code' => '400'],400);
    }

    public function update(CertificateRequest $request){
        $cer = Certificate::find($request->input('id'));
        if(!is_null($cer)){
            $req = $request->all();
	        $cer->update($req);
	        return response()->json(['data' => $cer->fresh(),'code' => '200'],200);
        }else
    		return response()->json(['error' => 'not found','code' => '404'],404);
    }

    public function show($id){
    	$ser = Certificate::where('id',$id)->first();
    	return response()->json(['data' => $ser,'code' => '200'],200);
    }

    public function index(){
    	$data = Certificate::where('user_id',Auth::user()->id)->get();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function destroy ($id){
        $cer = Certificate::find($id);
        if(!is_null($cer)){
            $cer->delete();
    		return response()->json(['data'=>'Deleted','code'=>'200'],200);
        }else
            return response()->json(['error' => 'not found','code' => '404'],404);
    }
}
