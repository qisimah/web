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
            $entry = new ChartEntry($play->file_id, $play->file->title, Chart::artistsNamesToString(File::allArtists($play->file)), Chart::arraysToString($play->file->producers()->pluck('nick_name')->toArray()), Chart::arraysToString($play->file->genres()->pluck('name')->toArray()), $play->file->release_date, $play->file->img, $play->file->audio, $play->plays, $position, 0, 1, $country_id, Carbon::today()->toDateString());
            $entry->setDuration($entry->duration());
            $entry->setPeakPosition($entry->peakPosition());
            $entry->setPreviousPosition($entry->previousPosition());
            array_push($_plays, $entry->getEntry());
            $position++;
        }
        return $_plays;
    }

    public static function entry($file_id, $title, $artists, $producers, $genres, $release_date, $album_art, $audio, $played, $position, $peak_position, $prev_position, $duration, $country_id, $chart_date)
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
            'peak_position' => $peak_position,
            'prev_position' => $prev_position,
            'duration' => $duration,
            'country_id' => $country_id,
            'chart_date' => $chart_date
        ];
    }

    /**
     * @param array $artists
     * @return string
     */
    public static function artistsNamesToString(array $artists)
    {
        $names = '';
        foreach($artists as $index => $artist){
            $names .= "$artist ";
            if($index === 0 && count($artists) > 1){
                $names .= 'ft. ';
            }
        }
        return $names;
    }

    public static function arraysToString(array $array)
    {
        return implode(', ', $array);
    }

    public static function previousPosition($file_id)
    {
        return Top24::where('file_id', $file_id)->first()->position;
    }

    public function previous()
    {
        return $this->previous = Top24::where('file_id', $this->entry['file_id'])->get();
    }

    public function position()
    {
        return $this->previous[0]->position;
    }

    public function duration()
    {
        return count($this->previous);
    }

    public function peakPosition()
    {
        return Top24::where('file_id', $this->entry['file_id'])->orderBy('position', 'desc')->first()->position();
    }
}
