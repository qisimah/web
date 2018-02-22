<?php

    namespace App\Http\Controllers;

    use App\Album;
    use App\Artist;
    use App\File;
    use App\Genre;
    use App\Label;
    use App\Play;
    use App\Producer;
    use App\User;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Rules\In;
    use Validator;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Input;

    class FileController extends Controller
    {
        protected $audio_mime = ['audio/mp3', 'audio/mpeg', 'audio/x-mpeg'];

        private function getUser()
        {
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
            $title = Input::get('title') ?? null; // set the title to the title variable sent in using the get method. otherwise set it to null
            $user = Auth::user();
            if ($user->type === 'admin' && (in_array($user->role, ['master', 'seer', 'uploader']))) {
                if ($title) {
                    $files = File::where('title', 'like', "%$title%")->with('artist', 'artists',
                        'uploader')->orderBy('id', 'desc')->paginate(20);
                } else {
                    $files = File::with('artist', 'artists', 'uploader')->orderBy('id', 'desc')->paginate(20);
                }
            } elseif ($user->type === 'admin' && $user->role === 'uploader') {
                if ($title) {
                    $files = $user->uploads()->where('title', 'like', "%$title%")->with('artist',
                        'artists')->orderBy('id', 'desc')->paginate(20);
                } else {
                    $files = $user->uploads()->with('artist', 'artists')->orderBy('id', 'desc')->paginate(20);
                }
            } elseif (in_array($user->role, ['advertiser', 'ad-agency', 'ad agency'])) {
                return redirect()->back()->with('failed', 'Nothing found');
            } else {
                # get file ids of files that have been shared with the user
                if ($title) {
                    $files = File::whereIn('q_id', User::getUserFiles())->where('title', 'like',
                        "%$title%")->with(['artist', 'artists', 'uploader'])->orderBy('id', 'desc')->paginate(20);
                } else {
                    $files = File::whereIn('q_id', User::getUserFiles())->with('artist', 'artists',
                        'uploader')->where('title', '<>', '')->orderBy('id', 'desc')->paginate(20);
                }
            }

            return view('pages.content', compact('files', 'user'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $user = Auth::user();
            return view('pages.music-file', compact('user'));

            if ($type === 'ad') {
                return view('pages.ad-file', compact('user'));
            } elseif ($type === 'song') {
                return view('pages.music-file', [
                    'user' => $user,
                    'genres' => Genre::orderBy('name')->get(),
                    'artists' => Artist::orderBy('nick_name')->get(),
                    'producers' => Producer::orderBy('nick_name')->get()
                ]);
            }
        }

        protected function validator(array $data)
        {
            return Validator::make($data, [
                'artist' => 'bail|required',
                'title' => 'bail|required',
                'genre' => 'bail|required'
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return array
         */
        public static function store($type, Request $request)
        {
            $audio = [];
            $audio['q_id'] = md5(uniqid('', true));
            $audio['artist_id'] = $request->input('artist');
            $audio['user_id'] = Auth::id();
            $audio['title'] = ucwords(strtolower($request->input('title')));
            $audio['indexed'] = 0;
            $audio['audio'] = $request->input('audio');
            $audio['f_storage_id'] = $request->input('f_storage_id');
            $audio['img'] = $request->input('img', '/images/logo/logo-sm-dark.png');
            $audio['release_date'] = $request->input('releaseDate', Carbon::today()->toDateString());

            if ($type === 'ad') {
                $audio['file_type'] = 'ad';
                $audio['name'] = ucwords(strtolower($request->input('name')));
                $file = File::create($audio);
                $artist = Artist::where('nick_name', $request->input('name'))->first();
                if ($artist) {
                    return $file->artists()->attach($artist->id);
                } else {
                    $artist = Artist::create(['nick_name' => $request->input('name'), 'q_id' => md5(uniqid('', true))]);
                    return $file->artists()->attach($artist->id);
                }
            } else {
                return File::saveSong($audio, $request->input('genres'), $request->input('artists'),
                    $request->input('producers'));
            }
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\File $file
         * @return File
         */
        public function show(File $file)
        {
            //
            return File::with('artist')->find($file->id);
        }

        public function details($id)
        {
            $file = File::with('artist', 'artists', 'album', 'genres', 'producers', 'label')->where('id', $id)->first();
            $_plays = Play::where('file_id', $file->q_id)->count();

            $all_songs = File::whereYear('release_date', Carbon::parse($file->release_date)->year)->pluck('q_id');
            $all_plays = Play::select(DB::raw('count(*) as plays, file_id'))->whereIn('file_id',
                $all_songs)->groupBy('file_id')->orderBy('plays', 'desc')->pluck('file_id');
            $_the_plays = Play::where('file_id', $file->q_id);

            $first_play = $recent_play = null;

            if ($_the_plays->count()) {
                if ($response = $_the_plays->get()->first()->created_at) {
                    $first_play = $response->toDateString();
                    $recent_play = $_the_plays->get()->last()->created_at->toDateString();
                }
            }


            return [$file, $_plays, array_search($file->q_id, $all_plays->toArray()) + 1, $first_play, $recent_play];

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\File $file
         * @return File
         */
        public function edit(File $file)
        {
            $user = Auth::user();
            if ($user->type <> 'admin') {
                $artists_ids = Auth::user()->artists->pluck('id');
                $artists = Artist::whereIn('id', $artists_ids)->orderBy('nick_name')->get();
            } else {
                $artists = Artist::orderBy('nick_name')->get();
            }

            $features = Artist::orderBy('nick_name')->get();

            $albums = Album::orderBy('name')->get();
            $genres = Genre::orderBy('name')->get();
            $producers = Producer::orderBy('nick_name')->get();
            $labels = Label::orderBy('name')->get();
            if ( ! in_array(Auth::user()->role, ['master', 'seer', 'uploader'])) {
                if (Auth::id() == $file->user_id) {
                    $song = File::with('artists', 'producers', 'label', 'album', 'genres')
                        ->where('id', $file->id)
                        ->first();
                } else {
                    return view('auth.unauthorized');
                }
            } else {
                $song = File::with('artists', 'producers', 'genres')
                    ->where('id', $file->id)
                    ->first();
            }
            return view('pages.update-music-metadata',
                compact('song', 'user', 'artists', 'features', 'albums', 'genres',
                    'producers', 'labels'));
        }

        /**
         * @param Request $request
         * @param $id
         * @return array|\Illuminate\Http\RedirectResponse
         */
        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'song-title' => 'required',
                'song-artist' => 'required|exists:artists,id',
                'song-genres' => 'required|exists:genres,id',
                'song-producers' => 'required|exists:producers,q_id',
                'song-release-date' => 'required|date',
                'song-album' => 'required|exists:albums,id',
                'song-featured-artists' => 'exists:artists,id',
                'song-label' => 'nullable|exists:labels,id'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $file = File::find($id);
            $file->title = ucwords(strtolower($request->input('song-title', $file->title)));
            $file->artist_id = $request->input('song-artist', $file->artist_id);
            $file->release_date = $request->input('song-release-date', $file->release_date);
            $file->album_id = $request->input('song-album', $file->album_id);
            $file->label_id = $request->input('song-label', $file->label_id);
            $file->indexed = $request->input('song-review', $file->indexed);

            if ($request->file('song-art')) {
                if ($request->file('song-art')->isValid()) {
                    $song_art = $request->file('song-art');
                    if ($song_art->getClientSize() > 1000000) {
                        $validator->errors()->add('failed', 'Song art is too large. Maximum image is 1MB');
                        return redirect()->back()->withInput()->withErrors($validator);
                    } elseif ( ! in_array($song_art->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png'])) {
                        $validator->errors()->add('failed',
                            'Image type not supported. Please upload images in jpg, jpeg & png or try re-encoding the image');
                        return redirect()->back()->withInput()->withErrors($validator);
                    } else {
                        $file->img = 'uploads/' . $song_art->storeAs('arts', md5(uniqid()), 'uploads');
                    }
                } else {
                    $validator->errors()->add('failed', 'The image is not valid. Please upload a different one!');
                    return redirect()->back()->withInput()->withErrors($validator);
                }
            }

            if ($file->save()) {
                // Get related data from pivot table, merge into new array and update
                $file->artists()->sync($request->input('song-featured-artists'));
                $file->producers()->sync($request->input('song-producers'));
                $file->genres()->sync($request->input('song-genres'));

                Session::flash('success', $file->title . ' was successfully updated!');
                return redirect()->to('songs');
            }

            return [
                'code' => 900,
                'message' => 'File update failed!'
            ];
        }

        /**
         * @param File $file
         * @return array
         * @throws \Exception
         */
        public function destroy(File $file)
        {
            //m@$73rp@$$
            if ( ! in_array(Auth::user()->role, ['master', 'seer'])) {
                Auth::user()->files()->detach($file->id);
                return ($file->delete()) ? ['code' => 100, 'message' => 'File deleted!'] : [
                    'code' => 200,
                    'message' => 'File deletion failed!'
                ];
            }

            if ($file->review === 1) {
                $deleteFingerprint = File::deleteFingerPrint($file->acr_id) === 204;
            } else {
                $deleteFingerprint = 0;
            }


            if (in_array($deleteFingerprint, [0, 204])) {
                if (file_exists('../' . $file->audio)) {
                    unlink('../' . $file->audio);
                }

                if (!is_null($file->img) && file_exists('../' . $file->img)) {
                    unlink('../' . $file->img);
                }

                if ($file->forceDelete()) {
                    $file->artists()->detach();
                    $file->producers()->detach();
                    $file->genres()->detach();
                    $file->users()->detach();
                    $file->plays()->delete();

                    return ['code' => 100, 'message' => 'File deleted!'];
                }

                return ['code' => 200, 'message' => 'File deletion failed!'];
            }

            return ['code' => 300, 'message' => 'File finger print deletion failed!'];
        }

        public function prepareFile($file, $data, $type, $limit)
        {
            if ($type === 'audio') {
                $allowed = ['audio/mpeg', 'audio/x-mpeg-3', 'audio/mpeg3', 'audio/mp3'];
                $ext = '.mp3';
            } elseif ($type === 'image') {
                $allowed = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png'];
                $ext = '.jpg';
            }

            if (in_array($file->getClientMimeType(), $allowed)) {
                $ext = ($file->getClientMimeType() === 'image/png') ? '.png' : $ext;
                if ($file->getSize() < $limit) {
                    $featured = ($data['featured']) ? ' (f) ' . $data['featured'] : '';
                    $newname = $data['artist'] . ' - ' . $data['title'] . $featured;
                    if ($type === 'image') {
//					return Storage::put('audios', $file, 'public');
                        return $file->move('arts', $newname . $ext);
                    } else {
                        return $file->move('audios', $newname . $ext);
                    }

                } else {
                    return ['error' => 'File is too large'];
                }
            } else {
                return ['error' => 'file type of ' . $file->getClientMimeType() . ' not allowed'];
            }
        }

        public function uploadSong(Request $request)
        {
            $validator = Validator::make($request->all(), [ // validate request
                'song' => 'bail|required|file'
            ],
                ['song.file' => 'Upload failed. Please make sure the audio is in mp3 format and less 10MB']);

            if ($validator->fails()) { // if request fails validation
                return redirect('uploads/song')->withInput()->withErrors($validator);

            } elseif ( ! in_array($request->file('song')->getClientMimeType(),
                $this->audio_mime)) { // check for allowed
                // mime types
                $validator->errors()->add('song', 'The file is not in the right format. Please upload files with ' .
                    implode(', ', $this->audio_mime));
                return redirect('uploads/song')->withInput()->withErrors($validator);
            } elseif ($request->file('song')->getClientSize() > 10000000) { // check for filesize

                $validator->errors()->add('song', 'File is too large, maximum file size is 10MB');
                return redirect('uploads/song')->withInput()->withErrors($validator);
            } else { // if everything is fine

                $song = $request->file('song');
                $file = date('YmdHis') . '-' . uniqid() . '.mp3'; // generate file name using current date and time
                $filename = 'uploads/' . $song->storeAs('audios', $file, 'uploads'); // upload file to the uploads
                // directory in the root directory and append "uploads" to the returned path for proper loading

                $handle = fopen($filename, 'r'); // set the file handler to the just uploaded file
                $file_size = (filesize($filename) > 400000) ? 400000 : filesize($filename); // check for file size
                $content = fread($handle, $file_size); // read file contents
                fclose($handle); // close file handler

                $temp_file = uniqid() . '.tmp'; // generate name for temporal file
                Storage::disk('local')->put($temp_file, $content); // write file to local disk "storage/app/"
                $content = null; // unset content to free up memory

                $response = File::identifyAudio(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix()
                    . "$temp_file"); // identify the temporal audio written above

                if (is_array($response)) {
                    if ($response['status']['msg'] === 'Success' && $response['status']['code'] == 0) { // if song was
                        // identified
                        $song = File::where('q_id',
                            $response['metadata']['custom_files'][0]['audio_id'])->with('artist',
                            'artists')->first();
                        if ( ! is_null($song)) {
                            $file = File::create([
                                'q_id' => md5(uniqid()),
                                'audio' => $filename
                            ]); // save song and generate qisimah id
                            return redirect()->back()->with('warning',
                                "Yo! This audio sounds like " . $song->title . " by "
                                . $song->artist->nick_name)->with('version_of', $song->id)->with('file_id',
                                $file->q_id);
                        } else {
                            return redirect()->back()->with('failed',
                                "The audio you submitted matches a song, but metadata is currently unavailable. Please contact support");
                        }

                    } else { // if new song
                        $file = File::create([
                            'q_id' => md5(uniqid()),
                            'audio' => $filename
                        ]); // save song and generate qisimah id

                        if ($file->exists()) { // if file was created successfully, redirect to metadata form
                            User::find(Auth::id())->files()->attach($file->id); // Share the saved file with the user
                            return redirect()->to('uploads/song/' . $file->q_id . '/metadata');
                        }
                        $validator->errors()->add('file',
                            "We're unable to save your file right now, please try again later!"); // add new error to error bag
                        return redirect()->to('uploads/song')->withErrors($validator); // redirect to song upload form
                        // with errors
                    }
                } else {
                    return 'Request cannot be process right now';
                }
            }
        }

        public function saveMetadata(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'song-title' => 'required',
                'song-artist' => 'required|exists:artists,id',
                'song-genres' => 'required|exists:genres,id',
                'song-producers' => 'required|exists:producers,q_id',
                'song-release-date' => 'required|date',
                'song-version' => 'required|alpha|max:10|min:5',
                'song-album' => 'required|exists:albums,id',
                'song-featured-artists' => 'exists:artists,id',
                'song-label' => 'nullable|exists:labels,id',
                'r' => 'digits:1',
                'v' => 'exists:files,id'
            ]);

            if ($validator->fails()) { // if validator fails
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (Input::get('r')) {
                if (Input::get('r') != 1) {
                    return redirect()->back();
                }
            }

            $file = File::where('q_id', $request->input('file_id'), null)->first();

            if (is_null($file)) {

                $validator->errors()->add('file', 'Sorry, the file metadata could not be saved! Please try again!');
                return redirect()->back()->withInput()->withErrors($validator);

            } else { // Update the previously saved file with the metadata
                $file->title = $request->input('song-title');
                $file->version = $request->input('song-version');
                $file->release_date = $request->input('song-release-date');
                $file->artist_id = (int)$request->input('song-artist');
                $file->version_of = $request->input('song-version');
                $file->review = 0;
                $file->user_id = (int)Auth::id();
                $file->album_id = (int)$request->input('song-album');
                $file->label_id = $request->input('song-label');
                $file->indexed = 0;

                if ($request->file('song-art')) {
                    if ($request->file('song-art')->isValid()) {
                        $song_art = $request->file('song-art');
                        if ($song_art->getClientSize() > 1000000) {
                            $validator->errors()->add('failed', 'Song art is too large. Maximum image is 1MB');
                            return redirect()->back()->withInput()->withErrors($validator);
                        } elseif ( ! in_array($song_art->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png'])) {
                            $validator->errors()->add('failed',
                                'Image type not supported. Please upload images in jpg, jpeg & png or try re-encoding the image');
                            return redirect()->back()->withInput()->withErrors($validator);
                        } else {
                            $file->img = 'uploads/' . $song_art->storeAs('arts', md5(uniqid()), 'uploads');
                        }
                    } else {
                        $validator->errors()->add('failed', 'The image is not valid. Please upload a different one!');
                        return redirect()->back()->withInput()->withErrors($validator);
                    }
                }

                if ($file->save()) {
                    $file->producers()->sync($request->input('song-producers'));
                    $file->genres()->sync($request->input('song-genres'));
                    $file->artists()->sync($request->input('song-featured-artists'));

                    $featured_artists = $request->input('song-featured-artists');

                    if ( ! is_null($featured_artists)) {
                        /* Get all artists with users attached to them */
                        $artists = Artist::with('users')->whereIn('id', $featured_artists)->get();

                        /* Check if some artists were featured on the song */
                        if ($artists->count()) {
                            /* Iterate the artists array and pull out each artist */
                            $artists->each(function ($artist) use ($file) {
                                /* Check if the artist has been a shared with a user */
                                if ($artist->users->count()) {
                                    /* Iterate the users array and share the song with the users */
                                    $artist->users->each(function ($user) use ($file) {
                                        if ( ! is_null($user)) {
                                            User::shareFilesWithUser([$file->id], $user->id);
                                        }
                                    });
                                }
                            });
                        }
                    }

                    return redirect('songs')->with('success', $file->title . ' successfully saved!');
                }
                $validator->errors()->add('failed', $file->title . ' could not be saved!');
                return redirect('songs')->withErrors()->withInput();
            }
        }

        public function metadata($q_id)
        {
            $user = Auth::user();
            if ($user->type <> 'admin') {
                $artists_ids = Auth::user()->artists->pluck('id');
                $artists = Artist::whereIn('id', $artists_ids)->orderBy('nick_name')->get();
            } else {
                $artists = Artist::orderBy('nick_name')->get();
            }
            $features = Artist::orderBy('nick_name')->get(['id', 'nick_name']);
            $producers = Producer::orderBy('nick_name')->get(['q_id', 'nick_name']);
            $genres = Genre::orderBy('name')->get(['id', 'name']);
            $file_id = $q_id;
            $albums = Album::all();
            $labels = Label::all();
            return view('pages.music-metadata', compact('user', 'artists', 'features', 'producers', 'genres', 'file_id',
                'albums', 'labels'));
        }
    }
