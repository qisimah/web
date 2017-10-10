<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
	protected $fillable = ['name'];

	public function detections()
	{
		return $this->hasMany(Detection::class)->withTimestamps();
	}
}
