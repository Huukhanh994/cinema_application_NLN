<?php

namespace App\Charts;

use App\Models\Order;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class OrderChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
}
