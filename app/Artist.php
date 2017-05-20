<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //

	protected $fillable = ['first_name', 'last_name', 'name', 'country_of_birth', 'nationality', 'dob', 'bio'];

	public function detections()
	{
		return $this->belongsToMany('App\Detection')->withTimestamps();
	}

	public function files()
	{
		return $this->belongsToMany(File::class, 'artist_detection', 'artist_id', 'id');
	}

    public function images()
    {
        
	}

    public function albums()
    {
        
	}
}
