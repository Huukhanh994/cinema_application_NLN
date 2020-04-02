<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['city_name'];

    public function room()
    {
        return $this->hasMany(Room::class);
    }

    public function city_cluster()
    {
        return $this->hasMany(Cluster::class);
    }

    public function roomCluster()
    {
        return $this->hasOneThrough(
            'App\Models\Room',
            'App\Models\Cluster',
            'city_id',
            'cluster_id',
            'id',
            'cluster_id'
        );
    }


    // TODO: ĐÚNG ĐỊNH NGHĨA HasManyThrought
    public function rooms()
    {
        return $this->hasManyThrough(
            'App\Models\Room',
            'App\Models\Cluster',
            'city_id', // Foreign key on clussters table...
            'cluster_id', // Foreign key on rooms table...
            'id', // Local key on cities table...
            'cluster_id' // Local key on clusters table...
        );
    }

}
