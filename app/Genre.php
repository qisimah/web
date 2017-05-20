<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
	protected $fillable = ['name'];

	public function detections()
	{
		return $this->belongsToMany('App\Detection')->withTimestamps();
	}
}
