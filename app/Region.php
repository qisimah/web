<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function broadcasters()
    {
        return $this->hasMany(Broadcaster::class);
    }

    public static function getRegionCoordinates($country_id)
    {
        return self::where('country_id', $country_id)->get(['name', 'lat', 'lng']);
    }
}
