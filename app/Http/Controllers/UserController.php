<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\File;
use App\Http\Requests\UpdateEmailRequest;
use App\Mail\EmailRegisterClient;
use App\Language;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Project;
use App\Subscription;
use DB;
use Auth;
use App\Message;
use App\Notification;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;

class UserController extends Controller
{
    public function store( RegisterRequest $request )
    {
        DB::beginTransaction();
        $data = ['name'         =>  $request->input('name'),
                 'lastname'     =>  $request->input('lastname'),
                 'email'        =>  $request->input('email'),
                 'phone'        =>  $request->input('phone'),
                 'password'     =>  bcrypt($request->input('password')),
                 'username'		=>  $request->input('username'),
                 'type'         =>  $request->input('type')
                ];

        $resp = User::create($data);

        if( $resp ){
        	if( $request->input('type') == 3 ){
	        	$comp = ['name'         	=>  $request->input('company_name'),
		                 'count_personal'   =>  $request->input('count_personal'),
		                 'industry'        	=>  $request->input('industry'),
		                 'email'        	=>  $request->input('company_email'),
		                 'agent'     		=>  $request->input('agent'),
		                 'phone'			=>  $request->input('company_phone'),
		                 'specialist_needed'=>  $request->input('specialist_needed'),
		                 'specialist_type'  =>  $request->input('specialist_type'),
		                 'user_id'         	=>  $resp->id
		                ];
		        $store = Company::create($comp); 
		        if($store){
                    SubscriptionController::default();
		        	DB::commit();
		        	Mail::to($request->input('email'))
                        ->send(new EmailRegisterClient($request->input('name'),encryptMsg($request->input('email').'-'.$resp->id)));
        			return response()->json(['user' => $resp, 'company' => $comp, 'code' => '201'],201);
		        }else{
		        	DB::rollBack();
        			return response()->json(['error'=>'Bad Request','code' => '400'],400);
		        }      
	        }	
            BalanceController::default();
	        DB::commit();
            Mail::to($request->input('email'))
                        ->send(new EmailRegisterClient($request->input('name'),encryptMsg($request->input('email').'-'.$resp->id)));
        	return response()->json(['user' => $resp,'code' => '201'],201);
        }else{
        	DB::rollBack();
        	return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }
    }

    public function confirmUser($token){
        $arrayValues = desEncrypt($token);
        $user = User::whereEmail($arrayValues[0])
            ->where('confirmed',false)
            ->first();

        if(!is_null($user))
            $user->update(['confirmed'=>true]);
        else
            return response()->view('',['msg'=>'error token validado','status'=>'false']);

        return response()->view('',['msg'=>'user Confirmed','status'=>'ok']);
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        DB::beginTransaction();
        $req = $request->all();
    	if (Auth::user()->type == 4){
            $data = ['name'             =>  $req['name'],
                    'lastname'          =>  $req['lastname'],
                    'country_id'        =>  $req['country_id'],
                    'job_title'         =>  $req['job_title'],
                    'years_experience'  =>  intval($req['years_experience']),
                    'hourly_rate'       =>  $req['hourly_rate'],
                    'email_receive'     =>  boolval($req['email_receive']),
                    'about'             =>  $req['about']
                    ];
            if(isset($req['skills'])){
                if (count($user->subCategories) >= 1)
                    SubCategoryController::detach($user,$user->subCategories);
                
                SubCategoryController::attach($user,$req['skills']);
            }

            if(isset($req['languages'])){
                if (count($user->languages) >= 1)
                    LanguageController::detach($user,$user->languages);
                
                LanguageController::attach($user,$req['languages']);
            }
        }else{
            $data = $request->all();
        }

        if($user->update($data)){
            DB::commit();
            return response()->json(['user' => $user->fresh(),'code' => '200'],200);
        }else{
            DB::rollBack();
            return response()->json(['error'=>'Bad Request','code' => '400'],400);
        }
    }

    public function show(){
    	$user = User::where('id',1)->with('company','subCategories.category','workExperiences','certicates','educations','portfolios.files','country','languages')->first();
    	return response()->json(['user' => $user,'code' => '200'],200);
    }

    public function index(){
        $data = User::where('type',[3,4])->get();
        return response()->json(['data'=>$data,'code'=>'200'],200);
    }

    public function updateMail(UpdateEmailRequest $request){
        $user = User::whereId(Auth::user()->id)->first();

        if( !is_null($user) ){
            $user->update(['email'=>$request->input('email')]);
            return response()->json($user->fresh(),200);
        }
        return response()->json(['code'=>404,'message'=>'user not found'],404);
    }

    public function updatePass(Request $request){
        $user = User::find(Auth::user()->id);
        if(password_verify($request->input('old_pass'), $user->password)){
            $user->update(['password'=>bcrypt($request->input('new_pass'))]);
            return response()->json(['user' => $user,'code' => '200'],200);
        }else
            return response()->json(['error' => 'Contraseña incorrecta','code' => '400'],400);
    }

    public function checkUserExist($email=null){
        if(is_null($email))
            return response()->json([
                'code'  => 400,
                'error' => 'El email es requerido'
            ],400);
        else
            return response()->json([
                'code'    => 200,
                'message' => 'email valido'
            ],200);
    }

    public function getDataUserAuth(){
        $countProyectFi = Project::where('consulter_id',Auth::user()->id)
        ->where('status', 0)
        ->count();
        $countries = Country::all();
        $categories = Category::with('subCategories')->get();

        $user = User::with([
            'country'
        ])->where('id',Auth::user()->id)->first();
        $languages = Language::all();

        return response()->view('myProfile',[
            'countProyectFi' => $countProyectFi,
            'user'           => $user,
            'countries'      => $countries,
            'categories'     => $categories,
            'languages'      => $languages
        ]);
    }

    public function changStatus($status){
        $user = User::find(Auth::user()->id);
        $resp = $user->update(['work_available'=>$status]);

        return response()->json(['user' => $resp,'code' => '200'], 200);
    }

    public function test(){
        $por  = Project::find(1);
        $mess = Message::where('project_id',1)->where('work_space',1)->get();
        $noti = Notification::where('case','project')->where(function($query) use ($por){
                    $query->where('user_id',$por->client_id)->orWhere('user_id',$por->consulter_id);
                })->get();
        for ($i=0; $i < count($noti); $i++) { 
            $mess->push($noti[$i]);
        }
        $aa = $mess->sortBy('created_at');
        dd($aa[0]->message,$aa[1]->message,$aa[2]->message);
    }

    public function setAvatar(Request $request){

        if( $request->input('file') ){
            $this->hasImgProfileUser();
            $user = User::whereId( Auth::user()->id )->first();
            $nameImg = time() . 'image.png';
            Image::make($request->input('file'))->save(public_path('file/avatar/') . $nameImg);

            $user->files()->create([
                'name' => $nameImg,
                'path' => env('APP_URL') . 'file/avatar/' . $nameImg,
            ]);

            ImageOptimizer::optimize(public_path('file/avatar/' . $nameImg));
            $this->resizeImg($nameImg);

            return response()->json(['code'=>200,'message'=>'File uploaded'],200);
        }else
            return response()->json(['code' => 400, 'message'=>'file missing'],400);
    }

    public function resizeImg($nameFile){
        Image::make(public_path('file/avatar/' . $nameFile))->resize(32,32)
            ->save(public_path('file/avatar/' . '32x32_' . $nameFile));
        Image::make(public_path('file/avatar/' . $nameFile))->resize(64,64)
            ->save(public_path('file/avatar/' . '64x64_' . $nameFile));;
        Image::make(public_path('file/avatar/' . $nameFile))->resize(128,128)
            ->save(public_path('file/avatar/' . '128x128_' . $nameFile));
        Image::make(public_path('file/avatar/' . $nameFile))->resize(256,256)
            ->save(public_path('file/avatar/' . '256x256_' . $nameFile));;
    }

    public function delImgsProfile($filename){
        unlink(public_path('file/avatar/' . '32x32_' . $filename));
        unlink(public_path('file/avatar/' . '128x128_' . $filename));
        unlink(public_path('file/avatar/' . '256x256_' . $filename));
        unlink(public_path('file/avatar/' . '64x64_' . $filename));
        unlink(public_path('file/avatar/' . $filename));
    }

    public function hasImgProfileUser(){
        try{
            $img = File::where('fileable_id',Auth::user()->id)
                ->where('fileable_type','App\User')
                ->first();

            if( !is_null($img) ){
                $name = $img->name;
                $img->delete();
                $this->delImgsProfile($name);
            }
        }catch (\Exception $e){
            logger('Error: '.$e->getMessage());
        }
        return true;
    }
}
