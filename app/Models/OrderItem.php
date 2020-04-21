<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $table = 'order_items';

    protected $fillable = ['order_id', 'film_id', 'order_item_quantity', 'order_item_price'];

    public function film()
    {
        return $this->belongsTo('App\Models\Film','film_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'order_item_id');
    }
}
