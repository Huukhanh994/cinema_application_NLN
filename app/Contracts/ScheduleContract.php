<?php

namespace App\Contracts;

interface ScheduleContract 
{
    public function listSchedules(string $order = 'id',string $sort = 'asc',array $columns = ['*']);

    public function findScheduleById(int $id);

    public function createSchedule(array $params);

    public function updateSchedule(array $params);

    public function deleteSchedule(int $id);
}