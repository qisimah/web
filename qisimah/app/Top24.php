<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Top24 extends Model
{
    protected $table = 'top_24';
    protected $fillable = [
        'file_id', 'title', 'artists', 'producers', 'release_date', 'genres', 'album_art', 'audio', 'position', 'prev_position', 'duration', 'country_id', 'chart_date', 'plays'
    ];

    public static function getChartDays()
    {
        $start  =   Carbon::create(2017, 7, 1);
        $days   =   Carbon::today()->diffInDays($start);
        for ($i = 0; $i <= $days; $i++){
            $chart_days[] = Carbon::create(2017, 7, 1)->addDays($i)->toDateString();
        }
        return $chart_days;
    }

    public static function createTillDate()
    {
        $chart_days =   self::getChartDays();
        Top24::truncate();
        foreach ($chart_days as $chart_day) {
            $top24 = new \App\Jobs\Top24(1, $chart_day);
            $top24->handle();
            echo 'Top24 for '.$chart_day.' created!'."\n";
        }
    }
}
