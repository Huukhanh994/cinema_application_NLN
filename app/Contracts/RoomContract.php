<?php

namespace App\Contracts;

interface RoomContract
{
    public function listRooms(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findRoomById(int $id);


    public function createRoom(array $params);


    public function updateRoom(array $params);

    
    public function deleteRoom(int $id);

}