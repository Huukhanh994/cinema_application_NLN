<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmAttribute extends Model
{
    protected $table = 'film_attributes';

    protected $fillable = ['attribute_id','film_id','value','quantity','price'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
