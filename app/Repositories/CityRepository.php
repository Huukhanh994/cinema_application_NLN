<?php
namespace App\Repositories;

use App\Contracts\CityContract;
use App\Models\City;
use App\Traits\UploadAble;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

class CityRepository extends BaseRepository implements CityContract
{
    use UploadAble;

    public function __construct(City $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCities(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findCityById(int $id)
    {
        try {
            
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {
            
            throw new ModelNotFoundException($e);
        }
    }

    
}