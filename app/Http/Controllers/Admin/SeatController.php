<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\SeatContract;
use App\Models\Room;
use App\Models\Seat;

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

        $seats = $this->seatRepository->listSeats();
        $this->setPageTitle('Seat Index','Seat Index');
        
        return view('admin.seats.index',compact('seats','rooms','rows'));
    }


}
