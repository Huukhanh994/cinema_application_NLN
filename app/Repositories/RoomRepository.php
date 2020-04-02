<?php
namespace App\Repositories;

use App\Contracts\RoomContract;
use App\Models\Room;
use App\Traits\UploadAble;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

class RoomRepository extends BaseRepository implements RoomContract
{
    use UploadAble;

    public function __construct(Room $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listRooms(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findRoomById(int $id)
    {
        try {
            
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {
            
            throw new ModelNotFoundException($e);
        }
    }

    
    public function createRoom(array $params)
    {
        try {
            
            $collection = collect($params);

            $size = $collection->get('size_id');

            $merge = $collection->merge(compact('size'));

            $room = new Room($merge->all());

            // dd($room);
            $room->save();

            if($collection->has('cluster'))
            {
                $room->cluster()->associate($params['cluster']);
            }

            return $room;

        } catch (QueryException $exception) {
            
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateRoom(array $params)
    {
        $room = $this->findRoomById($params['room_id']);

        $collection = collect($params)->except('_token');

        $room->update($collection->all());

        if($collection->has('cluster'))
        {
            $room->cluster()->associate($params['cluster']);
        }

        return $room;
    }

    public function deleteRoom(int $id)
    {
        $room = $this->findRoomById($id);

        $room->delete();

        return $room;
    }
}