<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

	public function uploads()
    {
        return $this->hasMany(File::class);
    }

    public static function shareFilesWithUser(array $file_ids, $user_id)
    {
        $user = User::find($user_id); // get the user
        if ($user->type === 'advertiser' || $user->type === 'ad agency') {
            return [
                'status' => 'error',
                'message' => 'Files cannot be shared with advertisers or ad agencies'
            ];
        }
        $user_files = $user->files()->pluck('files.id')->toArray(); // get previously shared file ids
        $user->files()->sync(array_merge($user_files, $file_ids)); // merge the previously shared files ids with the new ids and insert
        return true;
	}

    public static function unshareFilesWithUser(array $file_ids, $user_id)
    {
        $user = User::find($user_id);
        $user_files = $user->files()->pluck('files.id')->toArray();
        foreach ($file_ids as $file_id) {
            if (in_array($file_id, $user_files)) {
                $user->files()->detach($file_id);
            }
            return true;
        }
        return false;
	}

    public static function shareArtistWithUser($artist_id, $user_id)
    {
        $user         = User::find($user_id); // get the user
        $user_artists = $user->artists()->pluck('artists.id')->toArray(); // get previously shared artist ids
        if ($user->type === 'advertiser' || $user->type === 'ad agency'){
            return [
                'status' => 'error',
                'message' => 'You cannot share artists with advertisers or ad agencies!'
            ];
        }
        if (count($user_artists) && $user->type <> 'record-label') {
            return [
                'status' => 'error',
                'message' => 'Multiple artists cannot be shared with this user'
            ];
        }
		array_push($user_artists, $artist_id);
        $user->artists()->sync($user_artists);

        User::shareFilesWithUser(Artist::find($artist_id)->files()->pluck('files.id')->toArray(), $user_id);
        User::shareFilesWithUser(File::where('artist_id', $artist_id)->pluck('id')->toArray(), $user_id);
        return true;
	}

    public static function unshareArtistWithUser($artist_id, $user_id)
    {
        $_user = User::find($user_id);
        $_user->artists()->detach($artist_id);

        User::unshareFilesWithUser(File::where('artist_id', $artist_id)->pluck('id')->toArray(), $user_id);
        User::unshareFilesWithUser(Artist::find($artist_id)->files()->pluck('files.id')->toArray(), $user_id);
        return true;
	}

    public static function unshareAllArtistsWithUser($user_id)
    {
        $user = User::find($user_id);
        $artists = $user->artists;
        foreach ($artists as $artist) {
            self::unshareArtistWithUser($artist->id, $user_id);
        }
        self::unshareAllFilesWithUser($user_id);
        return true;
	}

    public static function unshareAllFilesWithUser($user_id)
    {
        return DB::table('file_user')->where('user_id', $user_id)->delete();
	}

    public static function getUserFiles()
    {
        return User::find(Auth::id())->files()->pluck('q_id');
	}
}
