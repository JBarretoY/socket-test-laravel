<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortafolioRequest;
use Illuminate\Http\Request;
use App\Portfolio;
use DB;
use Auth;

class PortfolioController extends Controller
{
    public function store(PortafolioRequest $request){
        DB::beginTransaction();
    	$data = ['name'       => $request->input('name'),
                'description' => $request->input('description'),
                'user_id'     => Auth::user()->id
                ];
        
        $store = Portfolio::create($data); 
        if($store){
            SubCategoryController::attach($store,$request->input('categories'));
            FileController::move($store,$request->file('file'));
            DB::commit();
			return response()->json(['store' => $store, 'code' => '201'],201);
        }else{
            DB::rollBack();
			return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }
    }

    public function update(Request $request){
        $cer = Portfolio::find($request->input('id'));
        if(!is_null($cer)){
            DB::beginTransaction();
        	$req = $request->all();
            if ($cer->update($req)) {
                if ($req['sub_categories'] && count($cer->subCategories) >= 1) {
                    SubCategoryController::detach($cer,$cer->subCategories);
                    SubCategoryController::attach($cer,$req['categories']);
                }
                DB::commit();
                return response()->json(['data' => $req,'code' => '200'],200);
            }else{
                DB::rollBack();
                return response()->json(['error'=>'Update error','code' => '400'],400);
            }
        }else
    		return response()->json(['error' => 'not found','code' => '404'],404);
    }

    public function updateFiles(Request $request){
        $req = $request->all();
        $cer = Portfolio::find($req['portfolio_id']);
        if(is_null($cer)){
            return response()->json(['error' => 'not found','code' => '404'],404);
        }else{
            FileController::unlinck($cer);
            FileController::move($cer,$req['file']);
            return response()->json(['data' => 'update','code' => '200'],200);
        }
    }

    public function show($id){
    	$ser = Portfolio::where('id',$id)->with('files')->first();
    	return response()->json(['data' => $ser,'code' => '200'],200);
    }

    public function index(){
    	$data = Portfolio::where('user_id',Auth::user()->id)->with('files')->get();
    	return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function destroy ($id){
    	$cer = Portfolio::find($id);
        if(!is_null($cer)){
            SubCategoryController::detach($cer,$cer->subCategories);
            FileController::unlinck($cer);
            $cer->delete();
            return response()->json(['data'=>'deleted','code'=>'200'],200);
        }else
            return response()->json(['error' => 'not found','code' => '404'],404);
    }

    public function deleteFile(Request $request){
        FileController::unlinckEsp($request->input('file'));
        return response()->json(['data'=>'deleted','code'=>'200'],200);
    }

    public function addFile(Request $request){
        $port = Portfolio::find($request->input('portfolio_id'));
        FileController::move($port,$request->file('fie'));
        return response()->json(['data'=>'add','code'=>'200'],200);
    }
}
