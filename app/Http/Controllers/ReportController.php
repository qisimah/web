<?php

namespace App\Http\Controllers;

use App\Broadcaster;
use App\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function month()
    {
        $user = Auth::user();
        return view("pages.reports-dash", compact('user'));
    }

    public function getMonthlyReport()
    {
        return [
            Report::getReportMonthly(),
            Report::getTopBroadcastersInRegions(1),
            Report::rankBroadcasters(Broadcaster::getBroadcastersInRegions(1)),
            Report::top5PlaysForQuarter(),
            Report::top5Broadcasters()
        ];
    }
}
