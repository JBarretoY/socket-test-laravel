<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function update(Request $request){
        $comp = Company::find($request->input('id'));
    	$data = ['name'         	=>  $request->input('name'),
                'count_personal'    =>  $request->input('count_personal'),
                'industry'        	=>  $request->input('industry'),
                'email'  			=>  $request->input('email'),
                'agent'       		=>  $request->input('agent'),
                'phone'     		=>  $request->input('phone'),
                'specialist_needed'	=>  $request->input('specialist_needed'),
                'specialist_type'   =>  $request->input('specialist_type')
                ];
        $comp->update($data);
        return response()->json(['user' => $data,'code' => '200'],201);
    }

    public function show($id){
    	$comp = Company::where('id',$id)->first();
    	return response()->json(['company' => $comp,'code' => '200'],200);
    }
}
