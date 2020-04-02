<?php

namespace App\Http\Controllers\Site;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\FilmContract;
use App\Contracts\RateContract;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\City;
use App\Models\Film;
use App\Models\Rate;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Seat;
use Carbon;
use Illuminate\Support\Facades\DB;

class MoviesController extends BaseController
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

    public function getNowShowing()
    {
        $films = Film::with(['brand','images','attributes','categories','rates','schedule_film'])->get();
        // dd($films);
        $this->setPageTitle('Now Showing','Now Showing');

        return view('site.pages.movies.now_showing',compact('films'));
    }

    public function getRoomAjax(Request $request)
    {
        if($request->ajax())
        {
            $cityID = $request->get('cityID');

            $filmID = $request->get('filmID');

            // $rooms = Room::with(['film_using_pivot_schedules','cities','seats'])->whereHas('film_using_pivot_schedules',function($query) use ($filmID) {
            //     $query->where('film_id',$filmID);
            // })
            // ->get();
            $rooms = City::join('clusters','cities.id','clusters.city_id')
            ->join('rooms','clusters.cluster_id','rooms.cluster_id')
            ->join('schedules','rooms.id','schedules.room_id')
            ->join('films','schedules.film_id','films.id')
            ->leftJoin('seats','rooms.id','seats.room_id')
            ->select('films.*','schedules.*','clusters.*','cities.*',DB::raw('count(*) as seat_empty, seats.status'))
            ->with('rooms')
            ->where([
                ['cities.id',$cityID],
                ['films.id',$filmID],
                ['seats.status','=','normal'],
            ])
            ->groupBy('cities.id','seats.status')
            ->get();

            $seat_empty = DB::table('seats')
                ->join('rooms','seats.room_id','rooms.id')
                ->join('schedules','seats.room_id','schedules.room_id')
                ->join('films','schedules.film_id','films.id')
                ->join('clusters','rooms.cluster_id','clusters.cluster_id')
                ->join('cities','clusters.city_id','cities.id')
                ->select('seats.*','rooms.*',DB::raw('count(seats.room_id) as seat_empty, seats.status'))
                ->where([
                    ['seats.status','=','normal'],
                    ['films.id','=',$filmID],
                    ['cities.id','=',$cityID]
                ])
                ->groupBy('seats.status','rooms.room_name')
                ->get();

            // $result = DB::table('seats')
            // ->join('rooms', function ($join) use ($filmID,$cityID) {
            //     $join->on('seats.room_id', '=', 'rooms.id')
            //     ->join('clusters','rooms.cluster_id','clusters.cluster_id')
            //     ->join('cities','clusters.city_id','cities.id')
            //     ->join('schedules','rooms.id','schedules.room_id')
            //     ->join('films','schedules.film_id','films.id')
            //     ->where([
            //         ['films.id','=',$filmID],
            //         ['cities.id','=',$cityID]
            //         ]);
            // })
            // ->get();

            // $result = Seat::with('room')->whereHas('room',function($query) {
            //     $query->join('clusters','id','clusters.cluster_id')
            //     ->addSelect('clusters.*');
            // })
            // ->get();

            $result = DB::table('seats')
                ->join('rooms','seats.room_id','rooms.id')
                ->join('schedules','seats.room_id','schedules.room_id')
                ->join('films','schedules.film_id','films.id')
                ->join('clusters','rooms.cluster_id','clusters.cluster_id')
                ->join('cities','clusters.city_id','cities.id')
                ->select('seats.room_id','rooms.id',DB::raw('count(seats.room_id) as seat_empty, seats.status'))
                ->where([
                    ['seats.status','=','normal'],
                    ['films.id','=',$filmID],
                    ['cities.id','=',$cityID]
                ])
                ->groupBy('seats.status','rooms.room_name')
                ->get();

            $schedule_films = Film::with('room_use_pivot_schedules')->whereHas('room_use_pivot_schedules',function($query) use ($filmID) {
                $query->where('film_id',$filmID);
            })->get();

            return response()->json(['rooms' => $rooms,'schedule_films' => $schedule_films,'seat_empty' => $seat_empty,'result' => $result]);
        }
    }

    public function show($slug)
    {
        $film = $this->filmRepository->findFilmBySlug($slug);

        $list_actor = explode(', ', $film->actor);

        $this->setPageTitle('Now Showing Details','Now Showing Details');
        // dd($film);
        return view('site.pages.movies.now_showing_details',compact('film','list_actor'));
    }

    public function getAjax(Request $request)
    {
        
        if($request->ajax())
        {
            $mytime = Carbon\Carbon::now();
            $currentDate = $mytime->toDateTimeString();

            $weekMap = [
                0 => 'SU',
                1 => 'MO',
                2 => 'TU',
                3 => 'WE',
                4 => 'TH',
                5 => 'FR',
                6 => 'SA',
            ];
            $dayOfTheWeek = Carbon\Carbon::now()->dayOfWeek;
            $weekday = $weekMap[$dayOfTheWeek];

            $today = date("F j, Y, g:i a");

            $ID = $request->get('id');

            $film_ajax = Film::with(['brand','images','attributes','categories','rates','room_use_pivot_schedules'])->where('id',$ID)->get();


            // $films = DB::table('films')
            //         ->join('schedules','films.id','schedules.film_id')
            //         ->join('rooms','schedules.room_id','rooms.id')
            //         ->join('clusters','rooms.cluster_id','clusters.cluster_id')
            //         ->join('cities','clusters.city_id','cities.id')
            //         ->select('films.id','films.*','schedules.*','rooms.*','cities.*','rooms.room_name','cities.city_name','clusters.*')
            //         ->where('films.id',$ID)
            //         ->groupBy('cities.id')
            //         ->get();
            // TODO: rooms_table tìm ra được những thông tin của phòng đó where relationship 'film_using_pivot_schedules' là where(film_id,REQUEST_GET('id'))
            // TODO: và đồng thời lấy được tên TỈNH/CITY của phòng đó nằm ở đâu.
            $films = Room::with(['film_using_pivot_schedules','cities'])
            ->whereHas('film_using_pivot_schedules', function($query) use ($ID){
                $query->where('film_id','=',$ID);
            })
            ->get();


            $dateCheck = $request->get('date');

            $rooms = City::join('clusters','cities.id','clusters.city_id')
            ->join('rooms','clusters.cluster_id','rooms.cluster_id')
            ->join('schedules','rooms.id','schedules.room_id')
            ->join('films','schedules.film_id','films.id')
            ->select('films.*','schedules.*','rooms.*','clusters.*','cities.*')
                ->with('rooms')
                ->where('films.id',$ID)
                ->groupBy('cities.id')
                ->get();

            // TODO: SUCCESFULLY!
            // 0:
            // id: 1
            // city_id: 1
            // name: "CGV Vincom Xuân Khánh"
            // qty: 125
            // notes: null
            // created_at: null
            // updated_at: "2020-03-20 03:03:15"
            // film_using_pivot_schedules: (4) [{…}, {…}, {…}, {…}]
            // city: {id: 1, name: "Cần Thơ", created_at: null, updated_at: null}
            // __proto__: Object
            // 1:
            // id: 6
            // city_id: 1
            // name: "CGV Vincom Hùng Vương"
            // qty: 100
            // notes: null
            // created_at: "2020-03-20 03:06:05"
            // updated_at: "2020-03-20 03:06:05"
            // film_using_pivot_schedules: [{…}]
            // city: {id: 1, name: "Cần Thơ", created_at: null, updated_at: null}
            // __proto__: Object
            // 2: {id: 5, city_id: 1, name: "CGV Sense City", qty: 125, notes: null, …}
            // 3: {id: 8, city_id: 2, name: "CGV Sư Vạn Hạnh", qty: 100, notes: null, …}
            // length: 4
            // __proto__: Array(0)
            $start = "";
            $end = "";
            foreach ($film_ajax as $film) {
                foreach ($film->room_use_pivot_schedules as $schedule) {
                    $start = $schedule->pivot->start_time;
                    $end = $schedule->pivot->end_time;
                }
            }

            $paymentDate = date('Y-m-d');
            $paymentDate=date('Y-m-d', strtotime($paymentDate));
            //echo $paymentDate; // echos today! 
            $contractDateBegin = date('Y-m-d', strtotime("$start"));
            $contractDateEnd = date('Y-m-d', strtotime("$end"));


            $filmID = $request->get('filmID');

            $films_date = City::join('clusters','cities.id','clusters.city_id')
            ->join('rooms','clusters.cluster_id','rooms.cluster_id')
            ->join('schedules','rooms.id','schedules.room_id')
            ->join('films','schedules.film_id','films.id')
            ->select('films.*','schedules.*','rooms.*','clusters.*','cities.*')
                ->with('rooms')
                ->where('films.id',$filmID)
                ->groupBy('cities.id')
                ->get();

            $max_date = Schedule::select('end_time')->join('films','schedules.film_id','films.id')->where('films.id',$filmID)->orderBy('end_time','desc')->first();

            return response(['Id' => $ID,
                'film_ajax' => $film_ajax,
                'currentDate' => $currentDate,
                'today' => $today,
                'weekday' => $weekday,
                'start' => $start,
                'end' => $end,
                'rooms'   => $rooms,
                'films'  => $films,
                'dateCheck' => $dateCheck,
                'films_date'    => $films_date,
                'max_date'  => $max_date
            ]);
        }
    }
}
