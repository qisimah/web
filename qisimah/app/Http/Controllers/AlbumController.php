<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
	protected $messages;
	protected $rules;

	public function __construct()
	{
		$this->middleware('auth');
		$this->rules = [
			'album-artist'			=>	'bail|required|exists:artists,id',
			'album-title'			=>	'bail|required|max:30',
			'album-release-date' 	=> 	'bail|required|date_format:Y-m-d',
			'album-art' 			=> 	'bail|file|image|max:1000000',
			'album-record-label'	=>	'bail|exists:labels,id'
		];

		$this->messages = [
			'album-artist.required'	=>	'album artist is required',
			'album-artist.exists'	=>	'the selected artist is not valid',
			'album-title.required'	=>	'album title is required',
			'album-title.max'		=>	'album title cannot to longer than 30 characters',
			'album-art.file'		=>	'album art could not be uploaded',
			'album-art.image'		=>	'album art should be an image in png, jpg, svg formats',
			'album-art.size'		=>	'the size of the album art must not exceed 1MB',
			'album-record-label.exists'	=>	'the selected record label does not exists',
			'album-release-date.required'	=>	'album release date is required',
			'album-release-date.date_format'	=>	'album release date format must be YYYY-MM-DD'
		];
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
		if (in_array($user->role, ['master', 'seer', 'uploader'])){
			$albums = Album::with('artist')->get();
		} else if ($user->role === 'user') {
			$albums = Album::where('created_by', Auth::id())->orWhere('name', 'Single')->with('artist')->get();
		}

        return view('pages.album-index', compact('user', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $labels = Label::all();
        if (in_array($user->role, ['master', 'seer', 'uploader'])){
			$artists = Artist::orderBy('nick_name')->get(['id', 'nick_name']);
		} else if ($user->role === 'user') {
        	$artist_ids = Auth::user()->artists->pluck('id');
			$artists = Artist::whereIn('id', $artist_ids)->orderBy('nick_name')->get(['id', 'nick_name']);
		}

        return view('pages.album-create', compact('user', 'labels', 'artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
        	return redirect()->back()->withErrors($validator)->withInput();
		}

		$album_art = 'images/logo/logo-sm-dark.png';

		if ($request->hasFile('album-art')) {
        	$album_art = 'uploads/'.$request->file('album-art')->storeAs('art', md5(uniqid()), 'uploads');
		}

		$album = Album::create([
			'name'			=>	$request->input('album-title'),
			'artist_id'		=>	$request->input('album-artist'),
			'created_by'	=>	Auth::id(),
			'label_id'		=>	$request->input('album-record-label'),
			'img'			=>	$album_art,
			'release_date'	=>	$request->input('album-release-date')
		]);

		if (is_null($album)) {
			$validator->errors()->add('failed', 'album could not be created!');
			return redirect()->back()->withErrors($validator)->withInput();
		}

		Session::flash('success', $request->input('album-title'). ' created successfully!');
		return redirect()->to('albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $user = Auth::user();
		if (in_array($user->role, ['master', 'seer', 'uploader'])){
			$artists = Artist::orderBy('nick_name')->get(['id', 'nick_name']);
		} else if ($user->role === 'user') {
			$artist_ids = Auth::user()->artists->pluck('id');
			$artists = Artist::whereIn('id', $artist_ids)->orderBy('nick_name')->get(['id', 'nick_name']);
		}
        $labels = Label::orderBy('name')->get(['id', 'name']);
        return view('pages.album-update', compact('user', 'album', 'artists', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
        	return redirect()->back()->withInput()->withErrors($validator);
		}

		$album->artist_id = $request->input('album-artist', $album->artist_id);
        $album->name = $request->input('album-title', $album->name);
        $album->release_date = $request->input('album-release-date', $album->release_date);
        $album->label_id = $request->input('album-record-label', $album->label_id);

        if ($request->hasFile('album-art')) {
        	$album->img = 'uploads/'. $request->file('album-art')->storeAs('arts', md5(uniqid()), 'uploads');
		}

		if ($album->save()) {
        	Session::flash('success', $album->name. ' has been updated!');
        	return redirect()->to('albums');
		} else {
        	$validator->errors()->add('failed', 'album could not be updated at this time!');
        	return redirect()->back()->withErrors($validator)->withInput();
		}
    }

	/**
	 * @param Album $album
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Album $album)
    {
        if ($album->exists()) {
        	if ($album->created_by === Auth::id()){
        		if ($album->delete()) {
        			Session::flash('success', 'Album deleted!');
				} else {
        			Session::flash('error', 'Album could not be deleted at this time!');
				}
			} elseif (in_array(Auth::user()->role, ['master', 'seer'])) {
				if ($album->delete()) {
					Session::flash('success', 'Album deleted!');
				} else {
					Session::flash('error', 'Album could not be deleted at this time!');
				}
			} else {
        		Session::flash('error', 'You do not have permission to perform this task. Please contact support!');
			}
		} else {
        	Session::flash('error', 'Album does not exists. This could be due to deletion by another user. Please refresh and try again!');
		}
		return redirect()->to('albums');
    }
}
