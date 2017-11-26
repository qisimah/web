<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function files()
	{
		return $this->belongsToMany(File::class, 'file_user', 'user_id')->withTimestamps();
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class)->withTimestamps();
    }

    public function listening(){
		return $this->belongsToMany(Broadcaster::class);
	}

    public function country()
    {
        return $this->belongsTo(Country::class);
	}

    public static function shareFilesWithUser($file_ids, $user_id)
    {
        $user = User::find($user_id);
        foreach ($file_ids as $file_id) {
            $user->files()->attach($file_id);
        }
	}

    public static function unshareFilesWithUser($file_ids, $user_id)
    {
        $user = User::find($user_id);
        foreach ($file_ids as $file_id) {
            $user->files()->detach($file_id);
        }
        return true;
	}

    public static function shareArtistWithUser($artist_id, $user_id)
    {
        User::find($user_id)->artists()->attach($artist_id);
        User::shareFilesWithUser(Artist::find($artist_id)->files()->pluck('files.id'), $user_id);
        User::shareFilesWithUser(File::where('artist_id', $artist_id)->pluck('id'), $user_id);
        return true;
	}

    public static function unshareArtistWithUser($artist_id, $user_id)
    {
        $_user = User::find($user_id);
        $_user->artists()->detach($artist_id);

        User::unshareFilesWithUser(File::where('artist_id', $artist_id)->pluck('id'), $user_id);
        User::unshareFilesWithUser(Artist::find($artist_id)->files()->pluck('files.id'), $user_id);
        return true;
	}

    public static function getUserFiles()
    {
        return User::find(Auth::id())->files()->pluck('q_id');
	}
}
