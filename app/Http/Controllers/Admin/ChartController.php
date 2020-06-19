<?php

namespace App\Http\Controllers\Admin;

use App\Charts\OrderChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $ordersChart = new OrderChart;
        $ordersChart->labels(['Jan', 'Feb', 'Mar']);
        $ordersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('admin.chart.index',['ordersChart' => $ordersChart]);
    }

}
