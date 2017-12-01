<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top7 extends Model
{
    protected $table = 'top_7';
    protected $fillable = [
        'file_id', 'title', 'artists', 'producers', 'release_date', 'genres', 'album_art', 'audio', 'position', 'prev_position', 'duration', 'country_id', 'chart_date', 'plays'
    ];
}
