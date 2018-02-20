<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Top24;

class ChartEntry extends Model
{
    private $entry;
    private $previous;
    private $model;

    public function __construct($model, $file_id, $title, $artists, $producers, $genres, $release_date, $album_art, $audio, $plays, $position, $prev_position, $duration, $country_id, $chart_date)
    {
        $this->entry = [
            'file_id' => $file_id,
            'title' => $title,
            'artists' => $artists,
            'producers' => $producers,
            'release_date' => $release_date,
            'genres' => $genres,
            'album_art' => asset($album_art),
            'audio' => $audio,
            'position' => $position,
            'peak_position' => 1,
            'prev_position' => $prev_position,
            'duration' => $duration,
            'country_id' => $country_id,
            'chart_date' => $chart_date,
            'plays' => $plays
        ];
        $this->model    = $model;
        $this->previous = $this->model::where('file_id', $this->entry['file_id'])->orderBy('chart_date', 'desc')->get();
    }

    public function getEntry()
    {
        return $this->entry;
    }

    public function setPeakPosition()
    {
        $entry = $this->model::where('file_id', $this->entry['file_id'])->orderBy('position', 'asc')->first();

        $this->entry['peak_position']   =   (isset($entry->id))? (integer) $entry->position : $this->entry['position'];
    }

    public function setDuration()
    {
        $this->entry['duration']    =   (integer) count($this->previous);
    }

    public function setPreviousPosition()
    {
        $this->entry['prev_position']   = (isset($this->previous[0]->id))? (integer) $this->previous[0]->position : 0;
    }

}

