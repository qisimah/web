<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Artist extends Model
{
    //

	protected $fillable = ['q_id', 'first_name', 'last_name', 'nick_name', 'country_of_birth', 'nationality', 'dob', 'bio'];

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

	public static function store(Request $request){
	    $artist = [];
	    $artist['nick_name']    =   ucwords(strtolower($request->input('nick_name')));
	    $artist['q_id']         =   md5(uniqid(''));
	    $artist['nationality']  =   $request->input('nationality', 'Ghana');
	    Artist::create($artist);
	    return redirect('/artist');
    }
}
