<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $user = User::where('email',$request->input('needle'))
        ->orWhere('username',$request->input('needle'))
        ->first();

        if( !is_null($user) && \Hash::check($request->input('password'),$user->password) ){
            $remember = $request->input('remember');
            Auth::login($user,!is_null($remember) ? true : false);

            return response()->json([
                'code' => 200,
                'auth' => true
            ],200);
        }else
            return response()->json([
                'code'  => 401,
                'error' => 'Credenciales invalidos'
            ],401);
    }

    public function logout(){
        Auth::logout();
        return response()->redirectTo('/');
    }
}
