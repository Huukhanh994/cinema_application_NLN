<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['author','content', 'film_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function film()
    {
        return $this->belongsTo('App\Models\Film');
    }
}
