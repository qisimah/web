<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chart extends Model
{
    //

    public static function top24($country_id)
    {
        $_plays = [];
        $position = 1;
        $stream_ids = Broadcaster::getBroadcastersStreamIdsForCountry($country_id);
        $plays =  Play::select(DB::raw('file_id, count(*) as plays'))->whereIn('stream_id', $stream_ids)->whereDate('created_at', Carbon::today()->toDateString())->with('file')->groupBy('file_id')->orderBy('plays', 'desc')->limit(24)->get();
        foreach ($plays as $play) {
            $entry = self::entry($play->file_id, $play->file->title, File::allArtists($play->file), $play->file->producers()->pluck('nick_name')->toArray(), $play->file->genres()->pluck('name')->toArray(), $play->file->release_date, $play->file->img, $play->file->audio, $play->plays, $position, 0, 1, $country_id, Carbon::today()->toDateString());
//            $_play = $play->toArray();
//            $_play['artists'] = File::allArtists($play->file);
//            $_play['genres'] = $play->file->genres()->pluck('name')->toArray();
//            $_play['producers'] = $play->file->producers()->pluck('nick_name')->toArray();
            array_push($_plays, $entry);
            $position++;
        }
        return $_plays;
    }

    public static function entry($file_id, $title, array $artists, array $producers, array $genres, $release_date, $album_art, $audio, $played, $position, $prev_position, $duration, $country_id, $chart_date)
    {
        return [
            'file_id' => $file_id,
            'title' => $title,
            'artists' => $artists,
            'producers' => $producers,
            'release_date' => $release_date,
            'genres' => $genres,
            'album_art' => $album_art,
            'audio' => $audio,
            'plays' => $played,
            'position' => $position,
            'prev_position' => $prev_position,
            'duration' => $duration,
            'country_id' => $country_id,
            'chart_date' => $chart_date
        ];
    }
}
