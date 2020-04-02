<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\SeatContract;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;
class SeatController extends BaseController
{
    protected $seatRepository;

    public function __construct(SeatContract $seatRepository)
    {
        $this->seatRepository = $seatRepository;
    }
    public function index()
    {
        $rooms = Room::all();
        $rows = Seat::distinct()->get(['row']);
        // dd($rows);
        $result = DB::table('seats')
        ->join('rooms','seats.room_id','rooms.id')
        ->join('schedules','seats.room_id','schedules.room_id')
        ->join('films','schedules.film_id','films.id')
        ->join('clusters','rooms.cluster_id','clusters.cluster_id')
        ->join('cities','clusters.city_id','cities.id')
        ->select('seats.*','rooms.*',DB::raw('count(seats.room_id) as seat_empty, seats.status'))
        ->where([
            ['seats.status','=','normal'],
            ['films.id','=',9],
            ['cities.id','=',2]
        ])
        ->groupBy('seats.status','rooms.room_name')
        ->get();

        $seats = $this->seatRepository->listSeats();
        $this->setPageTitle('Seat Index','Seat Index');
        
        return view('admin.seats.index',compact('seats','rooms','rows','result'));
    }


}
