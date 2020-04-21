<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\FilmContract;
use App\Contracts\RateContract;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Film;
use App\Models\Rate;
use App\Models\City;
use App\Models\Room;

class FilmController extends BaseController
{
    protected $filmRepository;

    protected $brandRepository;

    protected $categoryRepository;

    protected $rateRepository;

    public function __construct(
        FilmContract $filmRepository,
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        RateContract $rateRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->filmRepository = $filmRepository;
        $this->rateRepository = $rateRepository;
    }

    public function index()
    {
        $films = $this->filmRepository->listFilms();
        // dd(Film::whereHas('room_use_pivot_schedules', function($query) {
        //     $query->join('clusters','rooms.cluster_id','clusters.cluster_id')
        //     ->join('cities','clusters.city_id','cities.id')
        //     ->join('seats','rooms.id','seats.room_id')
        //     ->selectRaw(\DB::raw('count(seats.room_id) as seat_empty, seats.status'))
        //     ->where([
        //         ['cities.id','=',3],
        //         ['seats.status','=','normal']
        //     ])->groupBy('seats.status');
        // })
        // ->with('room_use_pivot_schedules')
            
        //     ->where('films.id','=',9)->get());
        // $cityID = 3;
        // $filmID = 9;
       
        // dd(City::whereHas('rooms', function($query) use ($cityID,$filmID) {
        //     $query->whereHas('film_using_pivot_schedules', function($query) use ($filmID) {
        //         $query->where('films.id','=',$filmID);
        //     })
        //     ->where('cities.id',$cityID);
            
        //  })
        //  ->with('rooms')
        //  ->get());
        $brands = $this->brandRepository->listBrands();

        $categories = $this->categoryRepository->listCategories();

        $rates = $this->rateRepository->listRates();
        
        $this->setPageTitle('Films','Index Films');

        return view('admin.films.index',compact('films','brands','categories','rates'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $params = $request->except('_token');

        $film = $this->filmRepository->createFilm($params);

        if (!$film) {
            return $this->responseRedirectBack('Error occurred while creating film.', 'error', true, true);
        }
        return $this->responseRedirect('admin.films.index', 'Film added successfully' ,'success',false, false);

    }

    public function edit($id) 
    {
        $brands = $this->brandRepository->listBrands();
        $categories = $this->categoryRepository->listCategories();
        $film = $this->filmRepository->findFilmById($id);
        $rates = $this->rateRepository->listRates();

        $this->setPageTitle('Edit Film','Edit Film');

        return view('admin.films.edit',compact('film','brands','categories','rates'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'  => 'required|max:191',
        ]);

        $params = $request->except('_token');

        $film = $this->filmRepository->updateFilm($params);

        if (!$film) {
            return $this->responseRedirectBack('Error occurred while updating film.', 'error', true, true);
        }
        return $this->responseRedirectBack('admin.films.index','Film updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $film = $this->filmRepository->deleteFilm($id);

        if (!$film) {
            return $this->responseRedirectBack('Error occurred while deleting brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.films.index', 'Brand deleted successfully' ,'success',false, false);
    }
}
