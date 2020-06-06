<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class AccountOrdersController extends Controller
{
    public function getOrders()
    {
        $orders = auth()->user()->orders;
        
        return view('site.pages.account.orders',compact('orders'));
    }

    public function getOrdersDetail($id)
    {
        $orders = Order::with('user')->withAndWhereHas('items', function ($query) {             // withAndWhereHas from Room Model function
                $query->with('film');
            })
            ->where('id', $id)
            ->get();
        // dd($orders);
        return view('site.pages.account.order_detail',compact('orders'));
    }

    public function profile()
    {
        return view('site.pages.account.profile');
    }

    public function updateInfo(Request $request, $id) 
    {
        $user = User::findOrFail($id);

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->city = $request->get('city');
        $user->address = $request->get('address');
        $user->tel = $request->get('tel');

        $user->save();

        return back()->with('success', 'User has been updated!');
    }
}
