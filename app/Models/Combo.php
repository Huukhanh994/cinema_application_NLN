<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $table = 'combos';

    protected $fillable = ['cb_id','cb_name','cb_image','cb_quantity','cb_price','cb_status','f_id'];

    public function food()
    {
        return $this->belongsTo('App\Models\Food','f_id','f_id');
    }
}
