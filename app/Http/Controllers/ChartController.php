<?php

namespace App\Http\Controllers;

use App\Chart;
use Carbon\Carbon;

class ChartController extends Controller
{
    private $title;
    private $description;

    public function __construct()
    {
        $this->title        = 'Most played Songs curated from real-time air play detections';
        $this->description  = 'Qisimah charts are collated from real-time air play detections across multiple radio stations in Africa';
    }

    public function top24()
    {
        $entries        = Chart::top24(1);
        $title          = 'Top 24 Music Chart - '.$this->title;
        $chart_title    = 'Top 24 Music Chart';
        $chart_date     = Carbon::today()->format('l jS \\of F Y');
        $chart_description = $this->description;
        $chart_unit     = 'Days';
        return view('auth.top24', compact('entries', 'chart_title', 'chart_date', 'title', 'chart_description', 'chart_unit'));
    }

    public function top7()
    {
        $entries        = Chart::top7(1);
        $title          = 'Top 7 Music Chart - '.$this->title;
        $chart_title    = 'Top 7 Music Chart';
        $chart_date     = Carbon::today()->startOfWeek()->format('l jS \\of F Y').' - '.Carbon::today()->endOfWeek()->format('l jS \\of F Y');
        $chart_description = $this->description;
        $chart_unit     = 'Weeks';
        return view('auth.top24', compact('entries', 'chart_title', 'chart_date', 'title', 'chart_description', 'chart_unit'));
    }

    public function top30()
    {
        $entries        = Chart::top30(1);
        $title          = 'Top 30 Music Chart - '.$this->title;
        $chart_title    = 'Top 30 Music Chart';
        $chart_date     = Carbon::today()->startOfMonth()->format('l jS \\of F Y').' - '.Carbon::today()->endOfMonth()->format('l jS \\of F Y');
        $chart_description = $this->description;
        $chart_unit     = 'Months';
        return view('auth.top24', compact('entries', 'chart_title', 'chart_date', 'title', 'chart_description', 'chart_unit'));
    }
}
