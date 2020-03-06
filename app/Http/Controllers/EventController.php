<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class EventController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function triggerEvent(Request $request=null){
        $to = User::findOrFail(1);
        $from = User::findOrFail(2);
        $message = "Hola como estas?";

        $to->receiveMessage($from, $message);


        $data = [
            "imagen" => "/images/photo.png",
            "title" => "Bienvenido",
            "descripcion" => "Te damos la bienvenida a la plataforma"
        ];

        $to->receiveNotification($data);

        return response()->json(['message' => 'Ok']);
    }

    public function send(Request $request){
        //dd($request);
        return $this->triggerEvent();
    }
}
