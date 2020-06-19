<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use App\Models\Order;
use App\Charts\OrderChart;
class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function dashboard()
    {
        $orders = $this->orderRepository->listOrders();
        $ordersChart = new OrderChart;
        $ordersChart->labels(['Jan', 'Feb', 'Mar']);
        $ordersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.dashboard.index', compact('orders','ordersChart'));
    }


    public function index()
    {
        $orders = $this->orderRepository->listOrders();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);
        // $order = Order::with('items')->where('order_number',$orderNumber)->get();
        // dd($order);
        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }
}
