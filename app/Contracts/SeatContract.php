<?php

namespace App\Contracts;

interface SeatContract
{
    public function listSeats(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findSeatById(int $id);

    public function createSeat(array $params);


    public function updateSeat(array $params);

    public function deleteSeat(int $id);

}