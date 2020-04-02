<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'clusters';

    protected $primaryKey = 'cluster_id';

    protected $fillable = ['cluster_name','full','address','fax','hotline','city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }
}
