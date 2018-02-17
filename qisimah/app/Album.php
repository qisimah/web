<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $name;
    protected $release_date;
    protected $fillable = ['release_date', 'name', 'label_id', 'img', 'artist_id', 'created_by'];

    public function files()
    {
        return $this->hasMany(File::class);
    }

	public function artist()
	{
		return $this->belongsTo(Artist::class);
    }
}
