<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;

class CronController extends Controller
{
    public function checkTimeExpirePublished(){
        $data = Project::with([
            'user',
            'user.subscriptions.package'
        ])->get();

        if( count($data) > 0 )
            \Log::debug('CRON - checkTimeExpirePublished WITH NO DATA');
        else{
            for($i = 0, $j = count($data); $i < $j; $i++){
                if($data[$i]->status == 1){
                    $daysFrom = $data[$i]->subscriptions->package->time_publish;
                    $dateInit = $data[$i]->publish_date;
                    $dateSubtraction = $this->isValidSubtraction($dateInit,$daysFrom);

                    if( !is_null($dateSubtraction) )
                        Project::whereId($data[$i])->update(['countdown' => $dateSubtraction]);

                    if($this->isDefeatedProject($dateInit,$daysFrom))
                        Project::whereId($data[$i])->update(['status' => 3]);
                }else
                    \Log::debug('CRON - checkTimeExpirePublished -- FINNISHED NO PROJECT');
            }
            \Log::debug('CRON - checkTimeExpirePublished -- FINNISHED');
        }
    }

    public function isValidSubtraction($date,$days){
        $datePub    = Carbon::createFromTimestamp($date);
        $futureDate = $datePub->addDays($days);
        $today = Carbon::now();
        if( $futureDate->greaterThanOrEqualTo($today) ){
            $todaySub = $today->sub($datePub);
            return $todaySub->toDateTimeString();
        }else
            return null;
    }

    public function isDefeatedProject($dateStrPub,$days){
        $datePub = Carbon::createFromTimestamp($dateStrPub);
        $today   = Carbon::now();
        return ($datePub->addDays($days)->greaterThan($today)) ? true : false;
    }
}
