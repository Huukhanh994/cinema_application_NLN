<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Cluster;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('created_at')->get();
        
        return view('site.pages.cinemas.index',compact('cities'));
    }

    public function showClusters(Request $request) {
        if(request()->ajax()) {
            $cityID = $request->get('cityId');

            $cluster = Cluster::where('city_id','=',$cityID)->get();

            return response()->json(['cluster' => $cluster]);
        }
    }
}
