<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['rating','rateable_type', 'rateable_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'rateable_id','id');
    }

}
