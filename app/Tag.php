<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }

    public function broadcasters()
    {
        return $this->belongsToMany(Broadcaster::class);
    }

    public static function getAllTags()
    {
        return Tag::all();
    }
}
