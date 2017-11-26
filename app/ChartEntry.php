<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartEntry extends Model
{
    //
    public $title           =   'null';
    public $artists         =   [];
    public $producers       =   [];
    public $release_date    =   'null';
    public $genres          =   [];
    public $album_art       =   'null';
    public $audio           =   'null';
    public $position        =   'null';
    public $prev_position   =   'null';
    public $duration        =   'null';
    public $chart_date      =   'null';

    public function __construct($file_id, $title, array $artists, array $producers, array $genres, $release_date, $album_art, $audio, $position, $prev_position, $duration, $country_id, $chart_date)
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
            'position' => $position,
            'prev_position' => $prev_position,
            'duration' => $duration,
            'country_id' => $country_id,
            'chart_date' => $chart_date
        ];
    }

}

