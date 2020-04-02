<?php
namespace App\Repositories;

use App\Contracts\ClusterContract;
use App\Models\Cluster;
use App\Repositories\BaseRepository;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;   

class ClusterRepository extends BaseRepository implements ClusterContract
{
    use UploadAble;

    public function __construct(Cluster $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listClusters(string $order = 'cluster_id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findClusterById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function createCluster(array $params)
    {
        try {
            
            $collection = collect($params);

            $clusters = new Cluster($collection->all());

            $clusters->save();

            if($collection->has('city')) {
                $clusters->city()->associate($params['city']);
            }

            return $clusters;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateCluster(array $params)
    {
        $cluster = $this->findClusterById($params['cluster_id']);       // from edit input:hidden

        $collection = collect($params)->except('_token');

        $cluster->update($collection->all());

        if($collection->has('city')) {
            $cluster->city()->associate($params['city']);
        }

        return $cluster;
    }

    public function deleteCluster($id)
    {
        $cluster = $this->findClusterById($id);

        $cluster->delete();

        return $cluster;
    }
}