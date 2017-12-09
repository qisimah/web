<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Top7 extends Model
{
    protected $table = 'top_7';
    protected $fillable = [
        'file_id', 'title', 'artists', 'producers', 'release_date', 'genres', 'album_art', 'audio', 'position', 'prev_position', 'duration', 'country_id', 'chart_date', 'plays'
    ];

    public static function getChartWeeks()
    {
        $start  = Carbon::create(2017, 7, 1);
        $end    = Carbon::today();
        $weeks  = $end->diffInWeeks($start);
        for ($i = 0; $i <= $weeks; $i++){
            $chart_Weeks[] = Carbon::create(2017, 7, 1)->addWeeks($i)->startOfWeek();
        }
        return $chart_Weeks;
    }

    public static function createTillDate()
    {
        $chart_dates    = self::getChartWeeks();
        Top7::truncate();
        foreach ($chart_dates as $chart_date) {
            $entries = Chart::top7(1, $chart_date);
            foreach ($entries as $entry) {
                Top7::create($entry);
            }
            echo 'Top7 for '.$chart_date->startOfWeek()->toDateString().' to '.$chart_date->endOfWeek()->toDateString().' created!'."\n";
        }
    }
}
