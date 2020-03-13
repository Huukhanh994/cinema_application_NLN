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

        $this->setPageTitle('Edit Film','Edit Film');

        return view('admin.films.edit',compact('film','brands','categories'));
    }

    public function update(Request $request)
    {
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
