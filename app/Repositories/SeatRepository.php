<?php
namespace App\Repositories;

use App\Contracts\SeatContract;
use App\Models\Seat;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

class SeatRepository extends BaseRepository implements SeatContract
{
    public function __construct(Seat $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listSeats(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findSeatById(int $id)
    {
        try {
            
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {
            
            throw new ModelNotFoundException($e);
        }
    }

    public function createSeat(array $params)
    {
        try {
            
            $collection = collect($params);

            $seat = new Seat($collection->all());

            $seat->save();

            if($collection->has('room'))
            {
                $seat->room()->associate($params['room']);
            }

            return $seat;

        } catch (QueryException $exception) {
            
            throw new InvalidArgumentException($exception->getMessage());
        }
    }


    public function updateSeat(array $params)
    {
        $seat = $this->findSeatById($params['id']);

        $collection = collect($params)->except('_token');

        $seat->update($collection->all());

        if($collection->has('room'))
        {
            $seat->room()->associate($params['room']);
        }

        return $seat;
    }

    public function deleteSeat(int $id)
    {
        $seat = $this->findSeatById($id);

        $seat->delete();

        return $seat;
    }

}