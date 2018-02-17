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

	/**
	 * get months for top 30 charts from July till date
	 * @return array
	 */
	public static function getChartMonths()
    {
        $month  =   Carbon::create(2017, 7, 1);
        $months =   Carbon::today()->diffInMonths($month);
        for ($i = 0; $i < $months; $i++){
            $chart_months[] = Carbon::create(2017, 7, 1)->addMonths($i);
        }
        return $chart_months;
    }

	/**
	 * create top 30 charts from July till date
	 */
	public static function createTillDate()
    {
        Top30::truncate();
        $chart_months = self::getChartMonths();
        foreach ($chart_months as $chart_month) {
            $entries = Chart::getChartEntries(1, $chart_month->startOfMonth()->toDateTimeString(), $chart_month->endOfMonth()->toDateTimeString(), 30, 'App\Top30');
            foreach ($entries as $entry) {
                Top30::create($entry);
            }
            echo 'Top 30 Created for '.$chart_month->toDateString().'!'."\n";
        }
    }

	public function createForMonth(Carbon $month)
	{
		Top30::whereDate('chart_date', $month->startOfMonth()->toDateString())->delete();
		$entries = Chart::getChartEntries(1, $month->startOfMonth()->toDateTimeString(), $month->endOfMonth()
		->toDateTimeString(), 30, 'App\Top30');

		foreach ($entries as $entry) {
			Top30::create($entry);
		}
    }
}
