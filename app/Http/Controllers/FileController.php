<?php

namespace App\Http\Controllers;

use App\Artist;
use App\File;
use App\Genre;
use App\Producer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if ($this->getUser()['type'] <> 'admin'){
			$files = User::find(Auth::id())->files()->with('artists')->get();
		} else {
			$files = File::with('artists')->get();
		}

		return view('pages.content', ['user' => $this->getUser(), 'files' => $files]);
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
        $audio['q_id']      =   md5(uniqid('', true));
        $audio['user_id']   =   Auth::id();
        $audio['title']     =   ucwords(strtolower($request->input('title')));
        $audio['indexed']   =   0;
        $audio['audio']     =   $request->input('audio');
        $audio['img']       =   $request->input('img', '/images/logo/logo-sm-dark.png');
        $audio['release_date']      =   $request->input('release_date', Carbon::today()->toDateString());

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
//
//    	$song['user_id'] 	= Auth::id();
//    	$song['artist'] 	= ucwords(strtolower($request->input('artist')));
//    	$song['title'] 		= ucwords(strtolower($request->input('title')));
//    	$song['featured']	= ($request->input('featured'))? ucwords(strtolower($request->input('featured'))) : null;
//		$song['producer'] 	= ucwords(strtolower($request->input('producer')));
//		$song['label'] 		= ucwords(strtolower($request->input('label')));
//		$song['genre'] 		= ($request->input('genre') <> '')? ucwords(strtolower($request->input('genre'))) : null;
//		$song['album'] 		= ucwords(strtolower($request->input('album')));
//		$song['indexed']    = 'Pending';
//		$song['year'] 		= $request->input('year');
//
//		if ($request->hasFile('audio')){
////			dd($request->file('audio')->getClientMimeType());
//			$song['audio'] = $this->prepareFile($request->file('audio'), $song, 'audio', '20000000');
//			if (gettype($song['audio']) === 'array'){
//				dd($song['audio']['error']);
//			}
//			if ($request->hasFile('img')){
//				$song['img'] = $this->prepareFile($request->file('img'), $song, 'image', '5000000');
//			} else {
//				$song['img'] = '/images/logo/logo-sm-dark.png';
//			}
//		} else {
//			dd('no file error');
//		}
//
//		if ($created = File::create($song)){
//			$artist  = Artist::firstOrCreate(['name' => $song['artist']]);
//			$created->artists()->attach($artist->id);
//
//			if ($song['featured'] <> null){
//				foreach (explode(',', $song['featured']) as $artist ) {
//					$record = Artist::firstOrCreate(['name' => $artist]);
//					$created->artists()->attach($record->id);
//				}
//			}
//
//			if ($song['genre'] <> null){
//				foreach ( explode(',', $song['genre']) as $item ) {
//					$record = Genre::firstOrCreate(['name' => $item]);
//					$created->genres()->attach($record->id);
//				}
//			}
//			return redirect('/file');
//		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
		return view('pages.updatefile', ['user' => Auth::user()->toArray(), 'file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
		$file->title = $request->input('title');
		$file->featured = $request->input('featured');
		$file->genre = $request->input('genre');
		$file->year = $request->input('year');
		$file->album = $request->input('album');
		$file->artist = $request->input('artist');
		$file->label = $request->input('label');
		if ($file->save()){
			return redirect('/file');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //m@$73rp@$$
		if ($file->user_id === Auth::id()){
			$art = $file->img;
			$audio = $file->audio;
			Storage::delete($art);
			Storage::delete($audio);
			return ($file->delete())? ['deleted' => true, 'message' => 'Record deleted successfully!'] : ['deleted' => false, 'message' => 'Sorry, deletion failed!'];
		}
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
