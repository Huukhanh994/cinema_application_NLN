<?php

namespace App\Repositories;

use App\Contracts\ScheduleContract;
use App\Models\Schedule;
use App\Traits\UploadAble;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;
use App\Repositories\BaseRepository;

class ScheduleRepository extends BaseRepository implements ScheduleContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Schedule $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listSchedules(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findScheduleById(int $id)
    {
        try {
           return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function createSchedule(array $params)
    {
        try {
            $collection = collect($params);

            $schedule_start = substr($collection->get('schedule_time'),0,19);
            $schedule_end = substr($collection->get('schedule_time'),22,19);

            if(substr($schedule_start,17,2) == 'AM') {
                $start = (date('Y-m-d h:i:s',strtotime($schedule_start)));
            } else{
                $start = (date('Y-m-d H:i:s',strtotime($schedule_start)));
            }

            if(substr($schedule_end,17,2) == 'AM') {
                $end = (date('Y-m-d h:i:s', strtotime($schedule_end)));
            } else {
                $end = (date('Y-m-d H:i:s',strtotime($schedule_end)));
            }

            $start_time = $start;
            $end_time = $end;
            
            $merge = $collection->merge(compact('start_time','end_time'));

            $schedule = new Schedule($merge->all());

            $schedule->save();
            
            return $schedule;
        } catch (QueryException $exception) {

            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateSchedule(array $params)
    {
        $schedule = $this->findScheduleById($params['schedule_id']);

        $collection = collect($params)->except('_token');

        $schedule->update($collection->all());

        return $schedule;
    }

    public function deleteSchedule(int $id)
    {
        $schedule = $this->findScheduleById($id);

        $schedule->delete();

        return $schedule;
    }
}