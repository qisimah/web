<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    //
	public function detections(){
		return $this->belongsTo(Detection::class, 'acr_id', 'acr_id');
	}
}
