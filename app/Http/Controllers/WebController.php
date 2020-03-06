<?php

namespace App\Http\Controllers;

use App\Package;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Country;
use Illuminate\Support\Facades\Redis;

class WebController extends Controller
{
    public function pageRegister($rol = null)
    {
        if (is_null($rol))
            abort(404, 'without_rol');
        else {
            if ($rol == 'consultant')
                return response()->view('regConsultant');
            elseif ($rol == 'client')
                return response()->view('regClient');
            else
                return abort(404, 'not_type');
        }
    }

    public function editProfile()
    {
        if (Auth::user()->type == 4)
            return view('profilesConsult');
        else
            return view('profilesClient');
    }

    public function indexLanding()
    {
        $rs = User::where('type', 4)
            ->get();
        $packs = Package::all();

        return response()->view('landing', [
            'consuls' => $rs->chunk(3),
            'packs' => $packs
        ]);
    }

    public function createProject()
    {
        if (auth()->check()) {
            if (auth()->user()->isConsultor()) {
                return redirect('/');
            }

            return view('publicProyect', [
                'categories' => Category::with('subCategories')->get(),
                'countries' => Country::all()
            ]);
        }

        abort(401);
    }

    public function searchConsultant(Request $request)
    {
        if ($request->input('needle')) {
            $needle = $request->input('needle');

            $rs = User::with(['files', 'balance' => function ($query) use ($needle) {
                $query->where('balances.win', '>=', $needle);
            }, 'country' => function ($query) use ($needle) {
                $query->where('countries.name', $needle);
            }, 'subCategories' => function ($query) use ($needle) {
                $query->where('sub_categories.name', $needle);
            }])
                ->where('type', 4)
                ->where(function ($query) use ($needle) {
                    $query->orWhere('cant_projects', '>=', $needle)
                        ->orWhere('name', 'like', '%' . $needle . '%');
                })
                //->orderBy($request->input('order'),$request->input('direction'))
                ->get();

            return response()->json(['code' => 200, 'response' => $rs], 200);
        }
        return response()->json(['code' => 400, 'response' => []], 404);
    }

    public function searchDeepConsultant(Request $request)
    {
        $rs = User::query();
        $rs = $rs->with('files');
        $rs->where('type', 4);

        if ($request->input('name'))
            $rs->where('name', 'like', '%' . $request->input('name') . '%');

        if ($request->input('skill')) {
            $skill = $request->input('skill');
            $rs->with(['subCategories' => function ($query) use ($skill) {
                $query->where('sub_categories.name', $skill);
            }]);
        }

        if ($request->input('win')) {
            $win = $request->input('win');
            $rs->with(['balance' => function ($query) use ($win) {
                $query->where('balances.win', '=', $win);
            }]);
        }

        if ($request->input('cant_pro'))
            $rs->where('cant_projects', $request->input('cant_pro'));

        if ($request->input('country')) {
            $country = $request->input('country');
            $rs->with(['country' => function ($query) use ($country) {
                $query->where('countries.name', $country);
            }]);
        }

        if ($request->input('hour_init') && $request->input('hour_end'))
            $rs->where('hourly_rate', '>=', $request->input('hour_init'))
                ->orWhere('hourly_rate', '<=', $request->input('hour_end'));

        if ($request->input('order') && $request->input('direction'))
            $rs->orderBy($request->input('order'), $request->input('direction'));

        $resp = $rs->get();
        return (count($resp) > 0) ? response()->json(['code' => 200, 'response' => $resp], 200) :
            response()->json(['code' => 404, 'response' => []], 404);
    }

    public function searchProject(Request $request)
    {
        if ($request->input('needle')) {
            $needle = $request->input('needle');
            $rs = Project::where('name', 'like', '%' . $request->input('needle') . '%')
                ->where('status',1)
                ->where('draft',false)
                ->with(['subCategories' => function ($query) use ($needle) {
                    $query->where('sub_categories.name', $needle);
                }, 'tasks' => function ($query) use ($needle) {
                    $query->where('tasks.name', $needle);
                }, 'country' => function ($query) use ($needle) {
                    $query->where('countries.name', $needle);
                }, 'bids' => function ($query) use ($needle) {
                    $query->where('bids.price', $needle);
                }])
                ->get();
            return response()->json(['code' => 200, 'response' => $rs], 200);
        }
        return response()->json(['code' => 400, 'response' => []], 404);
    }

    public function searchDeepProject(Request $request)
    {
        $rs = Project::query();
        $rs->where('status',1);
        $rs->where('draft',false);
        
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

        $resp = $rs->get();
        return (count($resp) > 0) ? response()->json(['code' => 200, 'response' => $resp], 200) :
            response()->json(['code' => 404, 'response' => []], 404);


    }

    public function projects()
    {
        if (auth()->check()) {
            if (auth()->user()->isConsultor()) {
                return redirect('/');
            }

            return view('myProjects');
        }

        abort(401, 'unauthorized');
    }

    public function myCredit()
    {
        if (auth()->check()) {
            return view('myCredit');
        }

        abort(401, 'unauthorized');
    }

    public function projectPreview(Request $request, $slug)
    {
        $project = Project::whereSlug($slug)->get()->first();

        if ($project) {
            return view('project', [
                'project' => $project
            ]);
        }

        abort(404, 'without_projects');
    }

    public function search(Request $request) {
        if ($request->name == "project") {
            $response = Project::query();
            $response->where('name', 'like', '%' . $request->keyword . '%');
            $response = $response->paginate(15);

            return view('projects', [
                'projects' => $response,
                'skills' => Category::with('skills')->get(),
                'countries' => Country::all()
            ]);
        } else {
            $response = User::query();
            $response = $response->with('files');
            $response->where('type', 4);

            $response->where('name', 'like', '%' . $request->keyword . '%');
            $response = $response->paginate(15);

            return view('consultants', [
                'consultants' => $response,
                'countries' => Country::all(),
                'skills' => Category::with('skills')->get()
            ]);
        }
    }

    public function inbox()
    {
        return view('messengerService');
    }
}
