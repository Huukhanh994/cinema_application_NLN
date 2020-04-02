<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';

    protected $fillable = ['name','status','room_id','row','seat_number','price'];

    protected $casts = [
        'room_id'   => 'integer',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
