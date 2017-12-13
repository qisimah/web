<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    public static function getReportMonthly()
    {
        $months = self::getMonths();
//        foreach ($months as $month) {
//            $plays[] = [substr($month[0], 0, 7), Play::whereBetween('created_at', [$month[0], $month[1]])->count()];
//        }
//        return $plays;

        if (Auth::user()['type'] === 'admin' && (in_array(Auth::user()['role'], ['master', 'seer']))){
            foreach ($months as $month) {
                $plays[] = ['date' => substr($month[0], 0, 7), 'plys' => Play::whereBetween('created_at', [$month[0], $month[1]])->count()];
            }
        } else {
            foreach ($months as $month) {
                $plays[] = ['date' => substr($month[0], 0, 7), 'plys' => Play::whereBetween('created_at', [$month[0], $month[1]])->whereIn('file_id', $file_ids)->count()];
            }
        }
        return $plays;
    }

    public static function getMonths()
    {
        $this_month = Carbon::today()->month;
        for ($i = 1; $i <= $this_month; $i++){
            $current = Carbon::create(Carbon::today()->year, $i);
            $months[] = [$current->startOfMonth()->toDateString(), $current->endOfMonth()->toDateString()];
        }
        return $months;
    }

    public static function getTopBroadcastersInRegions($country_id)
    {
        $regions = Broadcaster::getBroadcastersInRegions($country_id);
        $step = 1;
        $total = 0;

        $_plays = self::rankBroadcasters($regions);

        foreach ($_plays as $key => $value) {
            $total+= (integer) $value;
        }

        foreach ($_plays as $region => $count) {
            $finals[] = ['label' => $region, 'value' => round( ( ((integer)$count / $total) * 100 ))];
        }
        return $finals;
    }

    public static function rankBroadcasters($regions, $limit = 5)
    {
        foreach ($regions as $region => $stream_ids) {
            $plays[$region] = Play::whereIn('stream_id', $stream_ids)->count();
        }
        array_multisort($plays, SORT_DESC);
        return array_slice($plays, 0, $limit);
    }

    public static function top5PlaysForQuarter()
    {
        if (Auth::user()->type === 'admin' && ( Auth::user()->role === 'master' || Auth::user()->role === 'seer' ) ) {
            $file_ids = Play::selectRaw('file_id, count(*) as plays')->with('file')->groupBy('file_id')->orderBy('plays', 'desc')->limit(5)->pluck('file_id');
        } else {
            $file_ids = Play::selectRaw('file_id, count(*) as plays')->with('file')->whereIn('file_id', User::getUserFiles())->groupBy('file_id')->orderBy('plays', 'desc')->limit(5)->pluck('file_id');
        }

        $quarters = self::getQuarter();
        $plays = [];
        $labels = [];
        foreach ($file_ids as $file_id) {
            $labels[] = File::where('q_id', $file_id)->first()->title;
        }

        foreach ($quarters as $quarter) {
            foreach ($file_ids as $file_id) {
                $_plays[] = Play::where('file_id', $file_id)->whereBetween('created_at', $quarter)->count();
            }
            array_push($plays, $_plays);
            $_plays = [];
        }
        return [$labels, $plays];
    }

    public static function top5Broadcasters()
    {
        $labels = [];
        $plays  = [];
        $broadcasters = Play::selectRaw('stream_id, count(*) as plays')->with('broadcaster')->groupBy('stream_id')->orderBy('plays', 'desc')->limit(5)->get();
        foreach ($broadcasters as $broadcaster) {
            $labels[] = $broadcaster->broadcaster->name;
            $plays[] =  $broadcaster->plays;
        }
        return [$labels, $plays];
    }

    public static function getQuarter()
    {
        return [
            [
                Carbon::create(date('Y'), 1)->startOfQuarter()->toDateTimeString(), Carbon::create(date('Y'), 1)->endOfQuarter()->toDateTimeString()
            ],
            [
                Carbon::create(date('Y'), 4)->startOfQuarter()->toDateTimeString(), Carbon::create(date('Y'), 4)->endOfQuarter()->toDateTimeString()
            ],
            [
                Carbon::create(date('Y'), 7)->startOfQuarter()->toDateTimeString(), Carbon::create(date('Y'), 7)->endOfQuarter()->toDateTimeString()
            ],
            [
                Carbon::create(date('Y'), 10)->startOfQuarter()->toDateTimeString(), Carbon::create(date('Y'), 10)->endOfQuarter()->toDateTimeString()
            ]
        ];
    }
}
