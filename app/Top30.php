<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Top30 extends Model
{
    protected $table = 'top_30';
    protected $fillable = [
        'file_id', 'title', 'artists', 'producers', 'release_date', 'genres', 'album_art', 'audio', 'position', 'prev_position', 'duration', 'country_id', 'chart_date', 'plays'
    ];

    public static function getChartDays()
    {
        $month  =   Carbon::create(2017, 7, 1);
        $months =   Carbon::today()->diffInMonths($month);
        for ($i = 0; $i <= $months; $i++){
            $chart_months[] = Carbon::create(2017, 7, 1)->addMonths($i)->toDateString();
        }
        return $chart_months;
    }

    public static function createTillDate()
    {
//        $chart_days =   self::getChartDays();
//        Top30::truncate();
//        foreach ($chart_days as $chart_day) {
//            $top24 = new \App\Jobs\Top24(1, $chart_day);
//            $top24->handle();
//            echo 'Top24 for '.$chart_day.' created!'."\n";
//        }
    }
}
