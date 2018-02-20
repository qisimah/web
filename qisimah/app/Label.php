<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
	protected $fillable = ['name', 'created_by', 'updated_by'];

	public function detections()
	{
		return $this->hasMany(Detection::class)->withTimestamps();
	}

	public function artists()
	{
		return $this->belongsTo(Artist::class);
	}
}
