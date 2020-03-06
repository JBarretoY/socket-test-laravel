<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Balance;
use DB;

class TaskController extends Controller
{
    public function addPrice(Request $request){
        $sum = 0;
        $tasks = $request->input('tasks');
        $project = Task::find($tasks[0]['id'])->with('project');
        for ($i=0; $i < count($tasks); $i++) { 
            $sum = $sum + $tasks[$i]['price'];
        }

    	if($project->project->budget >= $sum){
            DB::beginTransaction();
            $count = 0;
            
            for ($i=0; $i < count($tasks); $i++) { 
                $task = Task::find($tasks[$i]['id']);
                $task->update(['price'=>$tasks[$i]['price']]);
                $count++;
            }
            if ($count == count($tasks)){
                DB::commit();
                return response()->json(['data' => $resp, 'code' => '200'],200);
            }else{
                DB::rollBack();
                return response()->json(['error'=>'Error al actualizar datos','code' => '400'],400);
            }
        }else
            return response()->json(['error'=>'La suma de los precios supera el presupuesto','code' => '400'],400);  
    }

    public function changeStatus (Request $request){
    	$task = Task::find($request->input('id'));
    	$task->update(['status',$request->input('status')]);
    	$proj = Task::where('id',$request->input('id'))->with('project.user')->first();
    	switch ($request->input('status')) {
    		case '1': //resuelta
    			$consulter = User::find($proj->project->consulter_id);
				$message = $consulter->username.' ha marcado como resuelto el hito '.$proj->name.' del proyecto '.$proj->project->name;
                $to = $proj->project->user->id;
    			break;

    		case '2': //finalizada
                //transacción
                $clientBalance = Balance::where('user_id',$consulter->id)->firts();
                $consulBalance = Balance::where('user_id',$client_id->id)->firts();
                $clientBalance->update(['working' => $clientBalance->working - $task->price]);
                $consulBalance->update(['working' => $consulBalance->working + $task->price,
                                        'win'     => $consulBalance->win + $task->price]);
                //transacción
                if (Auth::user()->type == 2)
    			    $message = 'El mediador a aprobado el hito del proyecto '.$proj->project->name;
                else
                    $message = $proj->project->user->username.' ha aprobado el hito '.$proj->name.' del proyecto '.$proj->project->name;

                $to = $consulter->id;
    			break;
    		
    		default: //reabierta
                if (Auth::user()->type == 2)
    			    $message = 'El mediador ha reabierto el hito del proyecto '.$proj->project->name;
                else
                    $message = $proj->project->user->username.' ha reabierto el hito '.$proj->name.' del proyecto '.$proj->project->name;
                
                $to = $consulter->id;
    			break;
    	}
        NotificationController::makeNotification($to,$menssage,null,null);
    	return response()->json(['data' => $task, 'code' => '200'],200);
    }
}
