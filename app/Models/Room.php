<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'city_id', 'name', 'notes','qty'
    ];


    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
