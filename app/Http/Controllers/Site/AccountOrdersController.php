<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountOrdersController extends Controller
{
    public function getOrders()
    {
        $orders = auth()->user()->orders;
        
        return view('site.pages.account.orders',compact('orders'));
    }

    public function getOrdersDetail()
    {
        return;
    }
}
