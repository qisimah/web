<?php

namespace App\Http\Controllers;

use App\Artist;
use App\File;
use App\Genre;
use App\Play;
use App\Producer;
use App\User;
use Carbon\Carbon;
use function Clue\StreamFilter\fun;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class FileController extends Controller
{
	private function getUser(){
		return Auth::user()->toArray();
	}

	public function __construct()
	{
		$this->middleware('auth');
		ini_set('max_execution_time', 300);

	}
    /**
     * Display a listing of files.
     * return views for the /file route
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->type === 'admin' && ($user->role === 'master' || $user->role === 'seer')){
            $files = File::with('artist', 'artists', 'uploader')->orderBy('id', 'desc')->paginate(20);
        } elseif ($user->type === 'admin' && $user->role === 'uploader') {
            $files = $user->uploads()->with('artist', 'artists')->orderBy('id', 'desc')->paginate(20);
        } else {
            # get file ids of files that have been shared with the user
            $files    = File::whereIn('q_id', User::getUserFiles())->with('artist', 'artists', 'uploader')->orderBy('id', 'desc')->paginate(20);
        }

		return view('pages.content', compact('files', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $user = Auth::user();
		if ($type === 'ad'){
		    return view('pages.ad-file', compact('user'));
        } elseif ($type === 'song') {
            return view('pages.music-file', ['user' => $user, 'genres' => Genre::orderBy('name')->get(), 'artists' => Artist::orderBy('nick_name')->get(), 'producers' => Producer::orderBy('nick_name')->get()]);
        }
    }

    protected function validator(array $data)
	{
		return Validator::make($data, [
			'artist' 	=> 	'bail|required',
			'title'		=>	'bail|required',
			'genre'		=>	'bail|required'
		]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function store($type, Request $request)
    {
        $audio = [];
        $audio['q_id']              =   md5(uniqid('', true));
        $audio['artist_id']         =   $request->input('artist');
        $audio['user_id']           =   Auth::id();
        $audio['title']             =   ucwords(strtolower($request->input('title')));
        $audio['indexed']           =   0;
        $audio['audio']             =   $request->input('audio');
        $audio['f_storage_id']      =   $request->input('f_storage_id');
        $audio['img']               =   $request->input('img', '/images/logo/logo-sm-dark.png');
        $audio['release_date']      =   $request->input('release', Carbon::today()->toDateString());

        if ($type === 'ad'){
            $audio['file_type'] =   'ad';
            $audio['name']  =   ucwords(strtolower($request->input('name')));
            $file = File::create($audio);
            $artist = Artist::where('nick_name', $request->input('name'))->first();
            if ($artist){
                return $file->artists()->attach($artist->id);
            } else {
                $artist = Artist::create(['nick_name' => $request->input('name'), 'q_id' => md5(uniqid('', true))]);
                return $file->artists()->attach($artist->id);
            }
        } else {
            return File::saveSong($audio, $request->input('genres'), $request->input('artists'), $request->input('producers'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return File
     */
    public function show(File $file)
    {
        //
        return File::with('artist')->find($file->id);
    }

    public function details($id)
    {
        $file   = File::with('artist', 'artists', 'album', 'genres', 'producers')->where('id', $id)->first();
        $_plays = Play::where('file_id', $file->q_id)->count();

        $all_songs = File::whereYear('release_date', Carbon::parse($file->release_date)->year)->pluck('q_id');
        $all_plays = Play::select(DB::raw('count(*) as plays, file_id'))->whereIn('file_id', $all_songs)->groupBy('file_id')->orderBy('plays', 'desc')->pluck('file_id');
        $_the_plays = Play::where('file_id', $file->q_id);

        $first_play = $recent_play = null;

        if ($_the_plays->count()){
            if ($response = $_the_plays->get()->first()->created_at){
                $first_play     = $response->toDateString();
                $recent_play    = $_the_plays->get()->last()->created_at->toDateString();
            }
        }


        return [$file, $_plays, array_search($file->q_id, $all_plays->toArray()) + 1, $first_play, $recent_play];

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return File
     */
    public function edit(File $file)
    {
        //
        if (!in_array(Auth::user()->role, ['master', 'seer'])){
            if (Auth::id() == $file->user_id){
                return File::with('artists', 'producers', 'label', 'album', 'genres')->where('id', $file->id)->first();
            } else {
                return view('auth.unauthorized');
            }
        }
		return File::with('artists', 'producers', 'label', 'album', 'genres')->where('id', $file->id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return array
     */
    public function update(Request $request, File $file)
    {
        //
		$file->title            = ucwords(strtolower($request->input('title', $file->title)));
		$file->artist_id        = $request->input('artist', $file->artist_id);
		$file->release_date     = $request->input('releaseDate', $file->release_date);
		$file->f_storage_id     = (!is_null($request->input('f_storage_id')))? $request->input('f_storage_id') : $file->f_storage_id;
        $file->img              = (!is_null($request->input('img')))? $request->input('img') : $file->img;

		$file->artists()->sync($request->input('artists'));
		$file->producers()->sync($request->input('producers'));
		$file->genres()->sync($request->input('genres'));

		if ($file->save()){
			return [
			    'code'  =>  100,
                'message'   =>  'File update successful!'
            ];
		}

        return [
            'code'  =>  900,
            'message'   =>  'File update failed!'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return array
     */
    public function destroy(File $file)
    {
        //m@$73rp@$$
        if (!in_array(Auth::user()->role, ['master', 'seer'])){
            Auth::user()->files()->detach($file->id);
            return ($file->delete())? ['code' => 100, 'message' => 'File deleted!'] : [ 'code' => 200, 'message' => 'File deletion failed!'];
        }

		if (File::deleteFingerPrint($file->acr_id) === 204){
		    if ($file->forceDelete()){
		        $file->artists()->detach();
		        $file->producers()->detach();
		        $file->genres()->detach();
		        $file->users()->detach();
		        $file->plays()->delete();

		        return [ 'code' => 100, 'message' => 'File deleted!'];
            }

            return [ 'code' => 200, 'message' => 'File deletion failed!'];
        }

        return [ 'code' => 300, 'message' => 'File finger print deletion failed!'];
    }

    public function prepareFile($file, $data, $type, $limit){
		if ($type === 'audio'){
			$allowed = ['audio/mpeg', 'audio/x-mpeg-3', 'audio/mpeg3', 'audio/mp3'];
			$ext = '.mp3';
		} elseif ($type === 'image'){
			$allowed = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png'];
			$ext = '.jpg';
		}

		if (in_array($file->getClientMimeType(), $allowed)){
			$ext = ($file->getClientMimeType() === 'image/png')? '.png' : $ext;
			if ($file->getSize() < $limit){
				$featured = ($data['featured'])? ' (f) '.$data['featured']: '';
				$newname = $data['artist'].' - '.$data['title'].$featured;
				if ($type === 'image'){
//					return Storage::put('audios', $file, 'public');
					return $file->move('arts', $newname.$ext);
				} else {
					return $file->move('audios', $newname.$ext);
				}

			} else {
				return ['error' => 'File is too large'];
			}
		} else {
			return ['error' => 'file type of '.$file->getClientMimeType().' not allowed'];
		}
	}
}
