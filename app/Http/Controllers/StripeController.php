<?php

namespace App\Http\Controllers;

use App\Package;
use App\User;
//use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\Plan;
use Stripe\Stripe;
use Stripe\Subscription;

class StripeController extends Controller
{
    private $keyStripe;

    public function __construct()
    {
        $this->keyStripe = env('STRIPE_API_KEY');
    }

    public function makeCustomer(){
        $user = User::whereId(auth()->id())->first();

        try{
            Stripe::setApiKey(env('STRIPE_API_KEY'));
            $arrayCus = [
                'email' => $user->email,
                'name'  => $user->name,
                'phone' => $user->phone
            ];
            $customer = Customer::create($arrayCus);
            $user->customer_id = $customer->id;
            $resp = $user->save();
        }catch (\Exception $exception){
            $resp = false;
        }

        return $resp;
    }

    public function makePlan2Package($package_id,$interval,$times){
        $package = Package::whereId($package_id)->first();
        Stripe::setApiKey(env('STRIPE_API_KEY'));
        $arrayPlan = [
            'amount'   => $package->price,
            'currency' => 'usd',
            'product'  => ['name' => $package->name],
            'interval' => $interval,
            'interval_count' => $times
        ];
        $planStripe = Plan::create($arrayPlan);
        $package->plan_id = $planStripe->id;
        return $package->save();
    }

    public function makeSubscription($plan_id,$customer_id){
        Stripe::setApiKey(env('STRIPE_API_KEY'));
        $arraySubs = [
            'customer' => $customer_id,
            'items'    => [['plan' => $plan_id]],
            'cancel_at_period_end' => true
        ];
        return Subscription::create($arraySubs);
    }
}
