<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top24 extends Model
{
    protected $table = 'top_24';
    protected $fillable = [
        'file_id', 'title', 'artists', 'producers', 'release_date', 'genres', 'album_art', 'audio', 'position', 'prev_position', 'duration', 'country_id', 'chart_date', 'plays'
    ];
}
