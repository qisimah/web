<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartEntry extends Model
{
    private $entry;
    private $previous;

    public function __construct($file_id, $title, $artists, $producers, $genres, $release_date, $album_art, $audio, $plays, $position, $prev_position, $duration, $country_id, $chart_date)
    {
        $this->entry = [
            'file_id' => $file_id,
            'title' => $title,
            'artists' => $artists,
            'producers' => $producers,
            'release_date' => $release_date,
            'genres' => $genres,
            'album_art' => $album_art,
            'audio' => $audio,
            'position' => $position,
            'peak_position' => 1,
            'prev_position' => $prev_position,
            'duration' => $duration,
            'country_id' => $country_id,
            'chart_date' => $chart_date,
            'plays' => $plays
        ];

        $this->previous = Top24::where('file_id', $this->entry['file_id'])->get();
    }

    public function getEntry()
    {
        return $this->entry;
    }

    public function setPeakPosition($value)
    {
        $this->entry['peak_position']   =   $value;
    }

    public function setDuration($value)
    {
        $this->entry['duration']    =   $value;
    }

    public function setPreviousPosition($value)
    {
        $this->entry['prev_position']   =   $value;
    }

    public function previousPosition()
    {
        return $this->previous[0]->position ?? 0;
    }

    public function duration()
    {
        return count($this->previous) + 1;
    }

    public function peakPosition()
    {
        $entry = Top24::where('file_id', $this->entry['file_id'])->orderBy('position', 'asc')->first();
        return (isset($entry->id))? $entry->position : $this->entry['position'];
    }

}

