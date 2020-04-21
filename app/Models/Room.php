<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $primaryKey = 'id';
    protected $fillable = [
        'cluster_id','room_name', 'notes','qty'
    ];


    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    // public function city()
    // {
    //     return $this->belongsTo(City::class);
    // }

    
    public function film_using_pivot_schedules()
    {
        return $this->belongsToMany(Film::class,'schedules')->withPivot('id','start_time','end_time');
    }

    public function cluster()
    {
        return $this->belongsTo('App\Models\Cluster','cluster_id','cluster_id');
    }


    // TODO: TỰ CHẾ TỪ HASMANYTRHOUGHT
    public function cities()
    {
        return $this->hasManyThrough(
            'App\Models\City',
            'App\Models\Cluster',
            'city_id',   // FK on cluster
            'id',       // city_id
            'id',       // id room
            'cluster_id' // id cluster
        );
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
                     ->with([$relation => $constraint]);
    }
}
