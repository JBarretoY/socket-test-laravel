<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Project;
use Illuminate\Http\Request;
use App\Notification;
use DB;
use App\User;
use Auth;

class NotificationController extends Controller
{
    public function markRead(Request $request){
    	DB::beginTransaction();
    	$nots = $request->input('notifications');
        for ($i=0; $i < count($nots); $i++) {
        	$not = Notification::find($nots[$i]);
	        if(!is_null($not)){
	        	$data = ['read'=>true];
		        $not->update($data);
		    }else{
		    	DB::rollBack();
		    	return response()->json(['error' => 'Notificación no encontrada','code' => '400'],400);
		    }
        }
        DB::commit();
        return response()->json(['data' => $data,'code' => '200'],200);
    }

    public function triggerEventNotification($data,$user_id){
        $user = User::find($user_id);
        $user->receiveNotification($data);
    }

    public static function makeNotification($to,$data,$case,$url){
        Notification::create([
            'user_id' => $to,
            'message' => $data,
            'read'    => false,
            'case'    => $case,
            'url'     => $url
        ]);

        (new NotificationController())->triggerEventNotification($data,$to);
    }

    public function makeNotificationApi(NotificationRequest $request){
        $project = Project::whereId($request->input('project_id'))->first();
        $userNameFrom = Auth::user()->username;
        $url = env('APP_URL') .'/'. $project->slug;

        if( !is_null($project) ){
            $data = [
                'user_id' => $request->input('user_id'),
                'message' => $userNameFrom . " le ha hecho una invitacion al proyecto " . $project->name,
                'url'     => $url,
                'read'    => false
            ];

            $noti = Notification::create($data);

            if( !is_null($noti) ){
                $this->triggerEventNotification($data,$request->input('user_id'));
                return response()->json(['code'=>201,$noti],201);
            }else
                return response()->json(['error' => ['Error creando notificaciones']],400);

        }else
            return response()->json(['error' => ['Error proyecto no encontrado']],404);
    }

    public function testNoti(){
        /*Notification::create([
            'user_id' => 4,
            'message' => "Hola Noti",
            'read'    => false,
            'case'    => "5454",
            'url'     => "giuhj"
        ]);*/

        (new NotificationController())->triggerEventNotification("Hola noti",4);
    }
}
