<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';

    protected $fillable = ['name','status','room_id','row','seat_number','cofs_id'];

    protected $casts = [
        'room_id'   => 'integer',
        'cofs_id'    => 'integer',   
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function categoryseat()
    {
        return $this->belongsTo('App\Models\CategoryOfSeat','cofs_id','cos_id');        // foreign_key , parent_key
    }
    
    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
                     ->with([$relation => $constraint]);
    }
}
