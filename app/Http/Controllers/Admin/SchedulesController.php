<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\FilmContract;
use App\Contracts\RoomContract;
use App\Contracts\ScheduleContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Cluster;
use App\Models\Room;

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
        $rooms = Room::with('cluster')->get();

        $films = $this->filmRepository->listFilms();

        $schedules = Schedule::with(['film','room'])->get();
        // dd($schedules);
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
        $film = $this->filmRepository->listFilms();

        $room = Room::with('cluster')->get();

        $schedule = $this->scheduleRepository->findScheduleById($id);
        if (substr(date('H:i A', strtotime($schedule->start_time)), 0, 2) > 12) {
            $start = date('m/d/Y h:i A', strtotime($schedule->start_time));
        } else {
            $start = date('m/d/Y h:i', strtotime($schedule->start_time)).' AM';
        }
        if (substr(date('H:i A', strtotime($schedule->end_time)), 0, 2) > 12) {
            $end = date('m/d/Y h:i A', strtotime($schedule->end_time));
        } else {
            $end = date('m/d/Y h:i', strtotime($schedule->end_time)).' AM';
        }
        // dd($end);
        $schedule_time = $start.' - '.$end;
        // dd($schedule_time);
        $this->setPageTitle('Edit Schedule','Edit Schedule');

        return view('admin.schedules.edit',compact('schedule','room','film','schedule_time'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $params = $request->except('_token');

        $schedule = $this->scheduleRepository->updateSchedule($params);

        if (!$schedule) {
            return $this->responseRedirectBack('Error occurred while updating schedule.', 'error', true, true);
        }
        return $this->responseRedirectBack('admin.schedules.index','Schedule updated successfully' ,'success',false, false);
    }
}
