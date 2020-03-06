<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SubCategory;
use App\Project;
use App\Subscription;
use DB;

class AdminController extends Controller
{
    public function adminData (){
    	$countRegis   = User::where('type',[3,4])->count();
    	$projectAct   = Project::where('status',2)->count();
    	$projectNoAct = Project::where('status',1)->count();
    	$subsAct      = Subscription::where('status',1)->count();
    	return;
    }

    public function subcategoUser($subCate_id){
    	$users = SubCategory::where('id',$subCate_id)->with('users')->first();
    	return response()->json(['users' => $users, 'code' => '200'],200);
    }
}
