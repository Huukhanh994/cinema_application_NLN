<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryOfSeat extends Model
{
    protected $table = 'category_of_seats';

    protected $fillable = ['cos_id','cos_name','cos_price','cos_note'];

    public function seats()
    {
        return $this->hasMany('App\Models\Seat');
    }
}
