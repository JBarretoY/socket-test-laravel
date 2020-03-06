<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispute;
use App\Project;
use App\Message;
use DB;

class DisputeController extends Controller
{
    public function store(Request $request){
    	$data = ['user_id'     	=>  Auth::user()->id,
                'project_id'   	=>  $request->input('project_id'),
                'description'	=>  $request->input('description')
                ];
        $store   = Dispute::create($data); 
        $project = Project::find($request->input('project_id'));
        if($store){
        	$message = 'El proyecto '.$project->name.' ha entrado en disputa.';
            NotificationController::makeNotification($project->client_id,$menssage,null,null);
            NotificationController::makeNotification($project->consulter_id,$menssage,null,null);
			return response()->json(['store' => $store, 'code' => '201'],201);
        }
        else
			return response()->json(['error'=>'Bad Request','code' => '400'],400);
    }

    public function show($id){
    	$ser = Dispute::where('id',$id)->with('user','project')->first();
    	return response()->json(['data' => $ser,'code' => '200'],200);
    }

    public function indexByUser($user_id){
    	$data = Dispute::where('user_id',$user_id)->get();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function indexByStatus($status){
    	$data = Dispute::where('status',$status)->get();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function result (Request $request){
    	return Dispute::where('id',$request->input('dispute_id'))->update(['user_id_win'=>$request->input('user_win'),'ammount'=>$request->input('ammount')]);
    }
}
