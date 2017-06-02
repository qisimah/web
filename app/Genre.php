<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Genre extends Model
{
    //
	protected $fillable = ['name', 'q_id', 'created_by'];

	public function detections()
	{
		return $this->belongsToMany('App\Detection')->withTimestamps();
	}

    public static function store($request)
    {
       return Genre::create(['name' => ucwords(strtolower($request->input('name'))), 'q_id' => md5(uniqid('')), 'created_by' => Auth::id()]);
	}
}
