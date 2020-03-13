<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seat;

class RoomAttributeController extends Controller
{
    public function loadSeats($id)
    {
        $seats = Seat::where('room_id','=',$id)->get();

        return response()->json($seats);
    }

    public function loadRows($id)
    {
        $rows = Seat::where('room_id','=',$id)->distinct()->get(['row']);

        return response()->json($rows);
    }
}
