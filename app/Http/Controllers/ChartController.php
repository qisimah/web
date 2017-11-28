<?php

namespace App\Http\Controllers;

use App\Chart;

class ChartController extends Controller
{
    public function top24()
    {
        $entries = Chart::top24(1);
//        return view('auth.top24');
        return view('auth.top24', compact('entries'));
    }
}
