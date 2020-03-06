<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class EscrowPaypalController extends Controller
{
    private $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function getTokenBearer(){
        $curl = $this->curl::to(env('BASE_URL_PAYPAL') . 'v1/oauth2/token')
            ->withHeaders([
                'Accept: application/json',
                'Accept-Language: en_US',
                'Content-Type: application/x-www-form-urlencoded'
            ])
            ->withOption('USERPWD',env('CLIENT_ID') . ':' .env('SECRET') )
            ->withData(['grant_type'=>'client_credentials'])
            ->returnResponseObject()
            ->post();

        if( $curl->status == 200 ){
            $respContent = json_decode($curl->content);
            return $respContent->access_token;
        }else{
            return false;
        }
    }

    public function sendPay(Request $request){
        $access_token = $this->getTokenBearer();

        if( $access_token ){
            $curl = $this->curl::to( env('BASE_URL_PAYPAL') .'v1/payments/payouts' )
                ->withHeaders([
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $access_token
                ])
                ->withData([
                    'sender_batch_header'=>[
                        'email_subject' => 'You have a payout!',
                        'email_message' => 'You have received a payout! Thanks for using our service!'
                    ],
                    'items'=>[
                            [
                                'recipient_type' => 'EMAIL',
                                'amount' => [
                                    'value'    => $request->input('amount'),
                                    'currency' =>'USD',
                                ],
                                "note"     => "Thanks for your patronage!",
                                "receiver" => "juanchaoss@gmail.com",
                            ]
                    ]
                ])
                ->asJson()
                ->returnResponseObject()
                ->post();

            return response()->json($curl,200);
        }
    }
}
