<?php

namespace App;

use Carbon\Carbon;
use function Clue\StreamFilter\fun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chart extends Model
{
    //

    public static function top24($country_id, Carbon $date = null)
    {
        $date = ($date)? $date->toDateString() : Carbon::today()->toDateString();
        $_plays = [];
        $position = 1;
        $stream_ids = Broadcaster::getBroadcastersStreamIdsForCountry($country_id);
        $plays =  Play::select(DB::raw('file_id, count(*) as plays'))
            ->whereIn('stream_id', $stream_ids)
            ->whereDate('created_at', $date)
            ->with('file')
            ->groupBy('file_id')
            ->orderBy('plays', 'desc')
            ->limit(24)
            ->get();
        foreach ($plays as $play) {
            $entry = new ChartEntry('App\Top24', $play->file_id, $play->file->title, Chart::artistsNamesToString(File::allArtists($play->file)), Chart::arraysToString($play->file->producers()->pluck('nick_name')->toArray()), Chart::arraysToString($play->file->genres()->pluck('name')->toArray()), $play->file->release_date, $play->file->img, $play->file->audio, $play->plays, $position, 0, 1, $country_id, $date);
            $entry->setDuration();
            $entry->setPeakPosition();
            $entry->setPreviousPosition();
            array_push($_plays, $entry->getEntry());
            $position++;
        }
        return $_plays;
    }

    public static function top7($country_id, Carbon $carbon = null)
    {
        if (is_null($carbon)){
            $carbon = Carbon::now();
        }
        $_plays = [];
        $position = 1;
        $stream_ids = Broadcaster::getBroadcastersStreamIdsForCountry($country_id);
        $plays =  Play::select(DB::raw('file_id, count(*) as plays'))->whereIn('stream_id', $stream_ids)->whereBetween('created_at', [$carbon->startOfWeek()->toDateTimeString(), $carbon->endOfWeek()->toDateTimeString()])->with('file')->groupBy('file_id')->orderBy('plays', 'desc')->limit(7)->get();
        foreach ($plays as $play) {
            $entry = new ChartEntry('App\Top7', $play->file_id, $play->file->title, Chart::artistsNamesToString(File::allArtists($play->file)), Chart::arraysToString($play->file->producers()->pluck('nick_name')->toArray()), Chart::arraysToString($play->file->genres()->pluck('name')->toArray()), $play->file->release_date, $play->file->img, $play->file->audio, $play->plays, $position, 0, 1, $country_id, $carbon->endOfWeek()->toDateString());
            $entry->setDuration();
            $entry->setPeakPosition();
            $entry->setPreviousPosition();
            array_push($_plays, $entry->getEntry());
            $position++;
        }
        return $_plays;
    }

    public static function top30($country_id, Carbon $month = null)
    {
        if (is_null($month)){
            $month =   Carbon::today();
        }
        return self::getChartEntries($country_id, $month->startOfMonth()->toDateTimeString(), $month->endOfMonth()->toDateTimeString(), 30, 'App\Top30');
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

    public function getPreviousPosition($file_id)
    {
        return Top24::where('file_id', $file_id)->first()->position;
    }

    public function getPrevious()
    {
        return $this->previous = Top24::where('file_id', $this->entry['file_id'])->get();
    }

    public function getPosition()
    {
        return $this->previous[0]->position;
    }

    public function getDuration()
    {
        return count($this->previous);
    }

    public function getPeakPosition()
    {
        return Top24::where('file_id', $this->entry['file_id'])->orderBy('position', 'desc')->first()->position();
    }

    public static function getChartEntries($country_id, $start, $finish, $limit, $model)
    {
        $_plays = [];
        $position = 1;
        $stream_ids = Broadcaster::getBroadcastersStreamIdsForCountry($country_id);
        $plays =  Play::select(DB::raw('file_id, count(*) as plays'))->whereIn('stream_id', $stream_ids)->whereBetween('created_at', [$start, $finish])->with('file')->groupBy('file_id')->orderBy('plays', 'desc')->limit($limit)->get();
        foreach ($plays as $play) {
            $entry = new ChartEntry($model, $play->file_id, $play->file->title, Chart::artistsNamesToString(File::allArtists($play->file)), Chart::arraysToString($play->file->producers()->pluck('nick_name')->toArray()), Chart::arraysToString($play->file->genres()->pluck('name')->toArray()), $play->file->release_date, $play->file->img, $play->file->audio, $play->plays, $position, 0, 1, $country_id, $start);
            $entry->setDuration();
            $entry->setPeakPosition();
            $entry->setPreviousPosition();
            array_push($_plays, $entry->getEntry());
            $position++;
        }
        return $_plays;
    }

    public static function dynamicChart($country_id, $start, $end, $limit)
    {
        $stream_ids = Broadcaster::where('country_id', $country_id)->pluck('stream_id');
        $songs = Play::select(DB::raw('file_id, count(*) as plays'))
            ->with('file.artist', 'file.artists')
            ->whereIn('stream_id', $stream_ids)
            ->whereBetween('created_at', [Carbon::parse($start)->startOfYear()->toDateTimeString(), Carbon::parse($end)->endOfYear()->toDateTimeString()])
            ->groupBy('file_id')
            ->orderBy('plays', 'desc')
            ->limit($limit)->get();
        $chart = "";
        foreach ($songs as $index => $value) {
            $artists = [];
            $position = $index + 1;
            foreach ($value->file->artists->toArray() as $artist) {
                $artists[] = $artist['nick_name'];
            }
            $all_artists = implode('/', array_merge([$value->file->artist->nick_name], $artists));
            $chart .= "Position:\t".$position."\r\nTitle:\t\t".$value->file->title."\r\nArtists:\t".$all_artists."\r\nPlays:\t\t".$value->plays."\r\n\r\n";
        }

        echo $chart;
    }
}
