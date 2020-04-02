<?php
namespace App\Contracts;

interface ClusterContract{
    public function listClusters(string $order = 'cluster_id',string $sort = 'asc',array $columns = ['*']);

    public function findClusterById(int $id);

    public function createCluster(array $params);

    public function updateCluster(array $params);

    public function deleteCluster(int $id);
}