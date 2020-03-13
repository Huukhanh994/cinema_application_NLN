<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\FilmContract;
use App\Contracts\RoomContract;
use App\Contracts\ScheduleContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends BaseController
{
    protected $roomRepository;

    protected $filmRepository;

    protected $scheduleRepository;

    public function __construct(
        RoomContract $roomRepository, 
        FilmContract $filmRepository, 
        ScheduleContract $scheduleRepository)
    {
        $this->filmRepository = $filmRepository;
        $this->roomRepository = $roomRepository;
        $this->scheduleRepository = $scheduleRepository;
    }

    public function index()
    {
        $rooms = $this->roomRepository->listRooms();

        $films = $this->filmRepository->listFilms();

        $schedules = Schedule::with(['film','room'])->get();

        $this->setPageTitle('Schedule Index','Schedule Index');

        return view('admin.schedules.index',compact('schedules','rooms','films'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $params = $request->except('_token');

        $schedule = $this->scheduleRepository->createSchedule($params);

        if (!$schedule) {
            return $this->responseRedirectBack('Error occurred while creating schedule.', 'error', true, true);
        }
        return $this->responseRedirect('admin.schedules.index', 'Schedule added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $schedule = $this->scheduleRepository->findScheduleById($id);

        $this->setPageTitle('Edit Schedule','Edit Schedule');

        return view('admin.schedules.edit',compact('schedule'));
    }
}
