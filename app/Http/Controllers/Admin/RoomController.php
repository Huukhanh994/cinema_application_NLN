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
use App\Contracts\ClusterContract;

class RoomController extends BaseController
{
    protected $rommRepository;

    protected $cityRepository;

    protected $clusterRepository;

    protected $seatRepository;

    public function __construct(RoomContract $rommRepository, CityContract $cityRepository, SeatContract $seatRepository,ClusterContract $clusterRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->rommRepository = $rommRepository;
        $this->seatRepository = $seatRepository;
        $this->clusterRepository = $clusterRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->listCities('city_name','asc');

        $clusters = $this->clusterRepository->listClusters('cluster_name','asc');

        $rooms = Room::with(['cities','cluster'])->get();

        // $test = City::join('clusters','cities.id','clusters.city_id')
        //     ->with('rooms')->get();
        // dd($test);
        $this->setPageTitle('Rooms','Index Rooms');

        return view('admin.rooms.index',compact('rooms','cities','clusters'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'room_name'      =>  'required|max:191',
            'cluster_id'     =>  'required',
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
        $clusters = $this->clusterRepository->listClusters();
        // dd($clusters);
        $room = $this->rommRepository->findRoomById($id);
        // dd($room);
        $rows = Seat::where('room_id','=',$id)->distinct()->get(['row']);
        // dd($rows);
        
        $seats = Seat::where('room_id','=',$id)->get();

        // dd($room);
        $this->setPageTitle('Edit Room','Edit Room');

        return view('admin.rooms.edit',compact('clusters','room','rows','seats'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'room_name'  => 'required|max:191',
            'cluster_id'   => 'required',
        ]);

        $params = $request->except('_token');

        $room = $this->rommRepository->updateRoom($params);

        if (!$room) {
            return $this->responseRedirectBack('Error occurred while updating room.', 'error', true, true);
        }
        return $this->responseRedirectBack('admin.rooms.index','Room updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $room = $this->rommRepository->deleteRoom($id);

        if (!$room) {
            return $this->responseRedirectBack('Error occurred while deleting room.', 'error', true, true);
        }
        return $this->responseRedirect('admin.rooms.index', 'Room deleted successfully' ,'success',false, false);
    }

    
}
