<?php

namespace App\Providers;

use App\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\CityContract;
use App\Contracts\FilmContract;
use App\Contracts\RateContract;
use App\Contracts\RoomContract;
use App\Contracts\ScheduleContract;
use App\Contracts\SeatContract;
use App\Repositories\AttributeRepository;
use App\Repositories\BrandRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\FilmRepository;
use App\Repositories\RateRepository;
use App\Repositories\RoomRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\SeatRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        CityContract::class             =>          CityRepository::class,
        RoomContract::class             =>          RoomRepository::class,
        SeatContract::class             =>          SeatRepository::class,
        FilmContract::class             =>          FilmRepository::class,
        RateContract::class             =>          RateRepository::class,
        ScheduleContract::class         =>          ScheduleRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
