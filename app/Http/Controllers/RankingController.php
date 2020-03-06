<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RankingRequest;
use App\Ranking;
use App\User;

class RankingController extends Controller
{
    public function setRankingUser(RankingRequest $request){
        $params = $request->all();
        $user   = User::whereEmail($params['needle'])
            ->orWhere('id',$params['needle'])
            ->first();

        if( !is_null($user) ){
            $rankUser = Ranking::firstOrCreate(['user_id'=>$user->id],['ranking'=>$params['ranking']]);

            if( !is_null($rankUser) )
                $rankUser->update(['ranking'=>$params['ranking']]);
        }else
            return response()->json(['code' => 404,'message'=>'user not found'],404);
    }
}
