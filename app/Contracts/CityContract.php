<?php

namespace App\Contracts;

interface CityContract
{
    public function listCities(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findCityById(int $id);


    // public function createCity(array $params);


    // public function updateCity(array $params);

    // public function deleteCity(int $id);

}