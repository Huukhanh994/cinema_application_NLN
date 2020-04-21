<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = ['f_id','f_name','f_price','f_quantity','f_image','f_status','coff_id'];

    public function categoryfood()
    {
        return $this->belongsTo(CategoryFood::class,'coff_id','cof_id');
    }

    public function combos()
    {
        return $this->hasMany('App\Models\Combo','cb_id','f_id');
    }
}
