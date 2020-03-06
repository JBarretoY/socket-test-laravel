<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Country;

class ConsultantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
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

        $resp = $rs->paginate(15);

        return view('consultants', [
            'consultants' => $resp,
            'countries' => Country::all(),
            'skills' => Category::with('skills')->get()
        ]);
    }

    public function show(Request $request, $username)
    {

        return view('consultant', [
            'consultant' => User::with('skills')->whereUsername($username)->whereType(4)->first()
        ]);
    }
}
