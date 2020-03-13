<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = [
        'code', 'name','logo'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class,'film_rates','rate_id','film_id');
    }
}
