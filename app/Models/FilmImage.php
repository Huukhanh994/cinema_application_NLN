<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmImage extends Model
{
    protected $table = 'film_images';

    protected $fillable  = ['full','film_id'];

    protected $casts = [
        'film_id'    => 'integer',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
