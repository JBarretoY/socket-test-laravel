<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Project;
use App\Balance;
use DB;
use Auth;
use App\User;

class BidController extends Controller
{
    public function store(Request $request){
    	DB::beginTransaction();
    	if (Auth::user()->type == 3) {
    		$last = Bid::where('project_id',$request->input('project_id'))
    					->where('last',true)
    					->where('user_id_to',$request->input('user_id_to'))
    					->orWhere('user_id_from',$request->input('user_id_from'))
    					->first();
    	}else{
    		$last = Bid::where('project_id',$request->input('project_id'))
    					->where('last',true)
    					->where('user_id_to',Auth::user()->id)
    					->orWhere('user_id_from',Auth::user()->id)
    					->first();
    	}

    	if(!is_null($last))
            $last->update(['last'=>false]);

    	$data = [
            'price'       	=>  $request->input('price'),
            'time'   		=>  $request->input('time'),
            'days'    		=>  $request->input('days'),
            'notes'  		=>  $request->input('notes'),
            'type'			=>  $request->input('type'),
            'last'			=>  true,
            'user_id_to'	=>  $request->input('user_id_to'),
            'project_id'	=>  $request->input('project_id'),
            'user_id_from'	=>  Auth::user()->id
        ];
        $store = Bid::create($data);

        if($store){
            $project = Project::find($request->input('project_id'));
            $menssage = Auth::user()->username.' te ha realizado una oferta en el proyecto '.$project->name;
            /*switch ($request->input('type')) {
                case '2': //contra oferta
                    $menssage = Auth::user()->username.' te ha realizado una oferta en el proyecto '.$project->name;
                    break;

                case '3': //aceptada
                    $consulter_id = Auth::user()->type == 3 ? $request->input('user_id_to') : Auth::user()->id;
                    $project->update(['budget'=>$request->input('price'),'consulter_id'=>$consulter_id]);

                    $dif = $project->budget - $request->input('price');
                    $clientBalnc = Balance::where('user_id',$project->client_id)->first();

                    $clientBalnc->update([
                        'working'  => $clientBalnc->working   - $dif,
                        'available'=> $clientBalnc->available + $dif
                    ]);

                    User::find($consulter_id)->increment('cant_projects');
                    User::find($project->client_id)->increment('count_contracts');

                    $menssage = Auth::user()->username.' ha aceptado la oferta en el proyecto '.$project->name;
                    break;
                
                default: //rechazada
                    $menssage = Auth::user()->username.' ha rechazado la oferta en el proyecto '.$project->name;
                    break;
            }*/
            NotificationController::makeNotification($request->input('user_id_to'),$menssage,'project',null);
        	DB::commit();
        	return response()->json(['store' => $store, 'code' => '201'],201);
		}
        else{
        	DB::rollBack();
			return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }
    }

    public function responseOffer(Request $request){
        $bid = Bid::find($request->input('bid_id'));
        $project = Project::find($bid->project_id);
        if($request->input('status') == 3){
            $consulter_id = Auth::user()->type == 3 ? $bid->user_id_to : Auth::user()->id;
            $project->update(['budget'=>$bid->price,'consulter_id'=>$consulter_id]);

            $dif = $project->budget - $bid->price;
            $clientBalnc = Balance::where('user_id',$project->client_id)->first();

            $clientBalnc->update([
                'working'  => $clientBalnc->working   - $dif,
                'available'=> $clientBalnc->available + $dif
            ]);

            User::find($consulter_id)->increment('cant_projects');
            User::find($project->client_id)->increment('count_contracts');

            $menssage = Auth::user()->username.' ha aceptado la oferta en el proyecto '.$project->name;
            $bid->update(['type'=>3]);
            NotificationController::makeNotification($bid->user_id_from, $menssage, 'project', null);
            return response()->json($bid->fresh(), 200);
        }elseif($request->input('status') == 4){
            $bid->update(['type'=>4]);
            $menssage = Auth::user()->username.' ha rechazado la oferta en el proyecto '.$project->name;
            NotificationController::makeNotification($bid->user_id_from, $menssage, 'project', null);
            return response()->json($bid->fresh(), 200);
        }else{
            return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }
    }
}
