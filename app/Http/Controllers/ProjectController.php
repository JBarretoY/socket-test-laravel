<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Balance;
use App\User;
use App\Subscription;
use DB;
use Auth;
use App\Http\Requests\ProjectRequest;
use Str;
use Carbon\Carbon;
use App\Category;
use App\Country;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function store( ProjectRequest $request )
    {
        $sus = Subscription::where('user_id',Auth::user()->id)->where('status',1)->first();
        if($sus->num_projects_available >= 1){
            $budget = Balance::where('user_id',Auth::user()->id)->first();
            $req = $request->all();
            DB::beginTransaction();
            $slug = Str::slug($req['name']);
            $data = ['name'         =>  $req['name'],
                     'description'  =>  $req['description'],
                     'budget'       =>  $req['budget'],
                     'country_id'   =>  $req['country_id'],
                     'client_id'    =>  Auth::user()->id,
                     'slug'         =>  $slug.strtotime(Carbon::now())
                    ];

            $resp = Project::create($data);

            if($resp){
                for ($i=0; $i < count($req['tasks']); $i++) { 
                    $task = ['name'         =>  $req['tasks'][$i],
                             'project_id'   =>  $resp->id,
                            ];
                    Task::create($task);
                }
                SubCategoryController::attach($resp,$req['categories']);

                if(!empty($req['file']))
                    FileController::move($resp,$req['file']);

                if($budget->available >= $request->input('budget')){
                    $budget->increment('working',$req['budget']);
                    $budget->decrement('available',$req['budget']);
                    $sus->decrement('num_projects_available');
                    User::find(Auth::user()->id)->increment('cant_projects');
                    $resp->update(['publish_date' => $resp->created_at]);
                    $draft = false;
                }else
                    $draft = true;

                DB::commit();
                return response()->json(['data' => $resp, 'draft'=>$draft, 'code' => '201'],201);     
            }else{
                DB::rollBack();
                return response()->json(['error'=>'Bad Request','code' => '400'],400);
            }
        }else
            return response()->json(['error'=>'Ha superado la cantidad de proyectos que puede crear','code' => '400'],400);
    }

    public function publishDraft($project_id){
        $budget  = Balance::where('user_id',Auth::user()->id)->first();
        $sus = Subscription::where('user_id',Auth::user()->id)->where('status',1)->first();
        $project = Project::find($project_id);
        if($budget->available >= $project->budget){
            if($sus->num_projects_available >= 1){
                $data = ['draft'=>false,
                         'publish_date'=>Carbon::now()->toDateTimeString()
                        ];
                if($project->update($data)){
                    $budget->increment('working',$req['budget']);
                    $budget->decrement('available',$req['budget']);
                    $sus->decrement('num_projects_available');
                }else
                    return response()->json(['error'=>'Error update','code' => '400'],400);   
            }else
                return response()->json(['error'=>'Ha superado la cantidad de proyectos que puede crear','code' => '400'],400); 
        }else
            return response()->json(['error'=>'Su presupuesto actual es insuficiente','code' => '400'],400); 
    }

    public function closeProject(Request $request){
        $proj = Project::find($request->input('project_id'));
        if (is_null($proj)){
            return response()->json(['error' => 'not found','code' => '404'],404);
        }else{
            DB::beginTransaction();
            if($proj->update(['status'=>0])){
                DB::commit();
                return response()->json(['user' => $user->fresh(),'code' => '200'],200);
            }
            else{
                DB::rollBack();
                return response()->json(['error'=>'Bad Request','code' => '400'],400);
            }
        }
    }

    public function indexUsers($project_id){
        $project = Project::find($project_id);
        $users = [];
        $users[] = User::find($project->client_id);
        $users[] = User::find($project->consulter_id);
        return response()->json(['users' => $users, 'code' => '200'],200);
    }

    public function index(Request $request){

        $rs = Project::query();

        if ($request->input('name'))
            $rs->where('name', 'like', '%' . $request->input('name') . '%');

        if ($request->input('skill')) {
            $skill = $request->input('skill');
            $rs->with(['subCategories' => function ($query) use ($skill) {
                $query->where('sub_categories.name', $skill);
            }]);
        }

        if ($request->input('category')) {
            $cate = $request->input('category');
            $rs->with(['tasks' => function ($query) use ($cate) {
                $query->where('tasks.name', $cate);
            }]);
        }

        if ($request->input('bid')) {
            $bid = $request->input('bid');
            $rs->with(['bids' => function ($query) use ($bid) {
                $query->where('bids.price', $bid);
            }]);
        }

        if ($request->input('country')) {
            $country = $request->input('country');
            $rs->with(['country' => function ($query) use ($country) {
                $query->where('countries.name', $country);
            }]);
        }

        if ($request->input('budget_init') && $request->input('budget_end')) {
            $rs->where('budget', '>=', $request->input('budget_init'))
                ->orWhere('budget', '<=', $request->input('budget_end'));
        }
        
        if ($request->input('order') && $request->input('direction'))
            $rs->orderBy($request->input('order'), $request->input('direction'));

        $resp = $rs->paginate(15);

        return view('projects', [
            'projects' => $resp,
            'skills' => Category::with('skills')->get(),
            'countries' => Country::all()
        ]);
    }

    /*public function indexByUser(Request $request){
        if($request->ajax()){
            if(Auth::user()->type == 3)
                $data = Project::where('client_id',Auth::user()->id)->get();
            elseif(Auth::user()->type == 4)
                $data = Project::where('consulter_id',Auth::user()->id)->get();
            else
                $data = [];

            return response()->json(['data'=>$data,'code'=>'200'],200);
        }
        return abort(404); 
    }*/

    public function indexByUser(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if(Auth::user()->type == 3){
                $query = Project::where('client_id',Auth::user()->id);

                if(!empty($data['word'])){
                    $query->where('name','ilike', '%'.$data['word'].'%')
                        ->orWhere('description', 'ilike', '%'.$data['word'].'%');
                }

                if(!empty($data['status'])){
                    $query->where('status',$data['status']);
                }
                // $query->get();
                return response()->json(['data'=>$query->get(),'code'=>'200'],200);
            }
            elseif(Auth::user()->type == 4){
                $query = Project::where('consulter_id',Auth::user()->id);

                if(!empty($data['word'])){
                    $query->where('name','ilike', '%'.$data['word'].'%')
                        ->orWhere('description', 'ilike', '%'.$data['word'].'%');
                }

                if(!empty($data['status'])){
                    $query->where('status',$data['status']);
                }

                return response()->json(['data'=>$query->get(),'code'=>'200'],200);
            }
            // else
            //     $query = [];

            // return response()->json(['data'=>$query,'code'=>'200'],200);
        }
        return abort(404); 
    }

    public function show($project_id){
        $project = Project::find($project_id);
        return response()->json(['data'=>$project,'code'=>'200'],200);
    }

    public function workspace(Request $request, $slug)
    {
        if ($project = Project::with(['user', 'consulter'])->whereSlug($slug)->get()->first()) {
            $mess = MessageController::indexWorkspace($project->id);
            return view('workspace', [
                'project' => $project,
                'chat'    => $mess
            ]);
        }

        abort(404);
    }

}
