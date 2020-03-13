<?php

namespace App\Repositories;

use App\Contracts\RateContract;
use App\Traits\UploadAble;
use App\Models\Rate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

class RateRepository extends BaseRepository implements RateContract
{
    use UploadAble;

    public function __construct(Rate $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listRates(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }


    public function findRateById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createRate(array $params)
    {
        try {
            
            $collection = collect($params);

            $rate = new Rate($collection->all());

            $rate->save();

            return $rate;

        } catch (QueryException $exception) {
            
            throw new InvalidArgumentException($exception->getMessage());
        }
    }


    public function updateRate(array $params)
    {
        $rate = $this->findSeatById($params['id']);

        $collection = collect($params)->except('_token');

        $rate->update($collection->all());


        return $rate;
    }

    public function deleteRate(int $id)
    {
        $rate = $this->findSeatById($id);

        $rate->delete();

        return $rate;
    }

    
}