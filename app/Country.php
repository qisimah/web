<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function broadcasters()
    {
        return $this->hasMany(Broadcaster::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getAllCountries()
    {
        return Country::all();
    }

    public static function getCountryRegions($country_id)
    {
        return Region::where('country_id', $country_id)->get();
    }
}
