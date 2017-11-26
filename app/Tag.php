<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function broadcasters()
    {
        return $this->belongsToMany(Broadcaster::class);
    }

    public static function getAllTags()
    {
        return Tag::all();
    }
}
