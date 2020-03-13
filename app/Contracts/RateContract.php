<?php
namespace App\Contracts;


interface RateContract 
{
    public function listRates(string $order = 'id',string $sort = 'desc',array $columns = ['*']);

    public function findRateById(int $id);

    public function createRate(array $params);

    public function updateRate(array $params);

    public function deleteRate(int $id);
}