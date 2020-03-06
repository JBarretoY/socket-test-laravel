<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;
use App\User;
use Auth;
use App\Project;
use App\Notification;

class MessageController extends Controller
{
    public function store(Request $request){
        if(Auth::user()->type == 2){
            $data = ['message'      =>  $request->input('message'),
                'read'          =>  false,
                'work_space'    =>  true,
                'project_id'    =>  $request->input('project_id')
            ];
        }else{
            $data = ['user_id_from' =>  Auth::user()->id,
                'user_id_to'    =>  $request->input('user_id_to'),
                'message'       =>  $request->input('message'),
                'read'          =>  false,
                'work_space'    =>  $request->input('work_space')
            ];
        }

        $user = User::whereId($request->input('user_id_to'))->first();
        $user->receiveMessage(Auth::user()->id,$request->input('message')); //trigger event to redis (Broadcast)
        $store = Message::create($data);

        if($store)
            return response()->json(['store' => $store, 'code' => '201'],201);
        else
            return response()->json(['error'=>'Bad Request','code' => '400'],400);
    }

    public function markRead(Request $request){
        DB::beginTransaction();
        $mess = $request->input('messages');
        for ($i=0; $i < count($mess); $i++) {
            $mess = Message::find($mess[$i]);
            if(!is_null($mess)){
                $data = ['read'=>true];
                $mess->update($data);
            }else{
                DB::rollBack();
                return response()->json(['error' => 'Mensaje no encontrado','code' => '400'],400);
            }
        }
        DB::commit();
        return response()->json(['data' => $data,'code' => '200'],200);
    }

    public static function indexWorkspace($project_id){
        $por  = Project::find($project_id);
        $mess = Message::where('project_id',1)->where('work_space',1)->get();
        $noti = Notification::where('case','project')->where(function($query) use ($por){
                    $query->where('user_id',$por->client_id)->orWhere('user_id',$por->consulter_id);
                })->get();
        for ($i=0; $i < count($noti); $i++) { 
            $mess->push($noti[$i]);
        }
        return $mess->sortBy('created_at');
    }
}
