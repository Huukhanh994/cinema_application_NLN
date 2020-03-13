<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = ['film_id','room_id','start_time','end_time'];

    protected $casts = [
        'film_id'   => 'integer',
        'room_id'   => 'integer',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
