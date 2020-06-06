<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $talble = 'orders';

    protected $fillable = [
        'order_number', 'user_id', 'order_status', 'order_grand_total',
        'order_item_count', 'order_payment_status', 'order_payment_method',
        'order_first_name', 'order_last_name', 'order_email', 'order_address', 'order_city', 'order_country', 'order_post_code', 'order_phone_number', 'order_notes'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'id');
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}

