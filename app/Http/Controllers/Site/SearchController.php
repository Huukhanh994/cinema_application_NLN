<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function searchGet(Request $request)
    {
        $film_result = Film::whereHas('categories', function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->key . '%')
                ->orWhere('film_name','LIKE','%'.$request->key.'%')
                    ->orWhere('actor', 'LIKE', '%' . $request->key . '%');
        })->get();
        // ->where('film_name','LIKE','%'.$request->key.'%')
        //             ->orWhere('actor', 'LIKE', '%' . $request->key . '%')
        //             ->get();
        // dd($film_result);
        $films = Film::with(['brand', 'images', 'attributes', 'categories', 'rates', 'schedule_film'])->paginate(6);
        // dd($films);
        return view('site.pages.movies.now_showing', ['film_result' => $film_result, 'films'=> $films]);
    }
}
