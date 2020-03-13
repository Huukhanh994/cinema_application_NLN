<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CityContract;
use App\Contracts\RoomContract;
use App\Contracts\SeatContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class RoomController extends BaseController
{
    protected $rommRepository;

    protected $cityRepository;

    protected $seatRepository;

    public function __construct(RoomContract $rommRepository, CityContract $cityRepository, SeatContract $seatRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->rommRepository = $rommRepository;
        $this->seatRepository = $seatRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->listCities('name','asc');
        
        $rooms = $this->rommRepository->listRooms();
        
        $this->setPageTitle('Rooms','Index Rooms');

        return view('admin.rooms.index',compact('rooms','cities'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'city_id'     =>  'required',
            'qty'   => 'required',
        ]);

        $params = $request->except('_token');

        $room = $this->rommRepository->createRoom($params);

        if (!$room) {
            return $this->responseRedirectBack('Error occurred while creating brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.rooms.index', 'Brand added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $city = $this->cityRepository->listCities();
        $room = $this->rommRepository->findRoomById($id);

        $rows = Seat::where('room_id','=',$id)->distinct()->get(['row']);
        // dd($rows);

        $seats = Seat::where('room_id','=',$id)->get();

        // dd($room);
        $this->setPageTitle('Edit Room','Edit Room');

        return view('admin.rooms.edit',compact('city','room','rows','seats'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:191',
            'city_id'   => 'required',
        ]);

        $params = $request->except('_token');

        $room = $this->rommRepository->updateRoom($params);

        if (!$room) {
            return $this->responseRedirectBack('Error occurred while updating brand.', 'error', true, true);
        }
        return $this->responseRedirectBack('admin.rooms.index','Brand updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $room = $this->rommRepository->deleteRoom($id);

        if (!$room) {
            return $this->responseRedirectBack('Error occurred while deleting brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.rooms.index', 'Brand deleted successfully' ,'success',false, false);
    }

    
}
