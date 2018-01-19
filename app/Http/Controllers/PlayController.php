<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Broadcaster;
use App\File;
use App\Play;
use App\Tweet;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Pusher\Pusher;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PlayController extends Controller
{
	protected $contents;

	/**
	 * @return mixed
	 */
	public function getContents()
	{
		return $this->contents;
	}

	/**
	 * @param mixed $contents
	 */
	public function setContents( $contents )
	{
		if (empty($contents)){
			$this->contents = $contents;
		} else {
			array_push($this->contents, $contents);
		}

	}
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['store']]);
		$this->setContents([]);
		ini_set('max_execution_time', 120);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.general-reports', ['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::append('test.txt', json_encode($request->all()));
        //
        $play   = json_decode($request->data, true);
        $log    = '';

        if (isset($request->status)){
            if ($request->status == 1 && strtolower($play['status']['msg']) == 'success' && $play['status']['code'] == 0){
                if (isset($play['metadata']['custom_files'])){
                    $saved = Play::create([
                        'stream_id'     => $request->stream_id,
                        'file_id'       => $play['metadata']['custom_files'][0]['audio_id'],
                        'created_at'    => $play['metadata']['timestamp_utc'],
                        'datatimestamp' => intval(strtotime(date('Y-m-d H:s:i')))
                    ]);

                    $file           = File::where('q_id', $play['metadata']['custom_files'][0]['audio_id'])->first();
                    $users          = $file->users()->pluck('users.id');
                    $the_player     = $saved->broadcaster()->with('country')->first();
                    $the_singer     = $file->artist;
                    $subscribers    = [];

                    foreach ($users as $user) {
                        array_push($subscribers, 'private-'.md5($user).'-channel');
                    }

                    $options = [
                        'cluster'   =>  'eu',
                        'encrypted' =>  true,
                        'curl_options' => [CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => false]
                    ];

                    $channels = array_merge(['private-listening-channel'], $subscribers);

                    $pusher = new Pusher('c4f320656ba2899c60c3', '70494a5a434228ab508a', '405750', $options);
                    $pusher->trigger($channels, 'play-event', Play::liveFeed($file, $the_player, $saved));

                    $title          = str_replace(' ', '', strtolower($file->title));
                    $artist         = ($the_singer->twitter_handle)? $the_singer->twitter_handle : $the_singer->nick_name;
                    $broadcaster    = ($the_player->twitter_handle)? $the_player->twitter_handle : $the_player->name.' - '.$the_player->frequency;

                    // Send Tweet
                    Tweet::PostPlay($artist, $title, $broadcaster);

                    $log .= Carbon::now()." => NEW DETECTION \n";
                    $log .= "Title: ".$play['metadata']['custom_files'][0]['title']."\n";
                    $log .= "\n";

                    Storage::append('detection.txt', $log);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function show(Play $play)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function edit(Play $play)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Play $play)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function destroy(Play $play)
    {
        //
    }

	public static function playsToday()
	{
		return Play::getTodayPlays();
    }


    /**
     * @return mixed
     * Gets Play data for user dashboard: total plays, most played etc...
     */
    public function getTodayPlayCount()
    {
        $count_plays = Play::countTodayPlays();
        $count_plays[1] = Play::songsPlayedToday();
        return [$count_plays, Play::countMostPlayed(), Play::countAllTimePlayed(), Play::countBroadcasterPlays(), User::find(Auth::id())->files()->pluck('q_id'), md5(Auth::user()->role), md5(Auth::id())];
    }

    public function getRealTimeUpdates()
    {
        $streamable = new StreamedResponse();
        $streamable->headers->set('Content-Type', 'text/event-stream');

        while (true) {
            $streamable->setCallback(function (){
                $data = json_encode($this->getTodayPlayCount());
                echo "data: $data\n\n";
                ob_flush();
                flush();
            });
            sleep(10);
            $streamable->send();
        }
    }

	public function getPlays($start, $end)
	{
		$user = Auth::user();
        $plays = Play::getPlays($start, $end);
        return view('pages.general-reports', compact('plays', 'user'));
    }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function playsOfBroadcaster()
	{
		return view('pages.broadcaster-reports', ['user' => Auth::user(), 'broadcasters' => Broadcaster::all()]);
    }

	public function getBroadcasterPlays( $stream_id, $start, $end )
	{

        $isRange    = Carbon::parse($start)->diffInDays(Carbon::parse($end));
        $_plays     = collect();

        $_user = Auth::user();
        if ($_user->role === 'master' || $_user->role === 'seer'){
            if ($isRange){
                Play::where('stream_id', $stream_id)
                    ->where('datatimestamp', '>=', Carbon::parse($start)->timestamp)
                    ->where('datatimestamp', '<=', Carbon::parse($end)->addDay()->timestamp)
                    ->with('file')->chunk(500, function ($plays) use($_plays){
                    $this->handleBroadcasterPlays($plays, $_plays);
                });

                return $_plays;
            }

            Play::where('stream_id', $stream_id)->whereDate('created_at', $start)->with('file')->chunk(500, function ($plays) use($_plays){
                $this->handleBroadcasterPlays($plays, $_plays);
            });

            return $_plays;
        } elseif ($_user->role === 'manager' || $_user->role === 'user') {
            $_files = collect();
            File::whereIn('id', $_user->files()->pluck('file_id'))->select('q_id')->chunk(500, function ($files) use ($_files){
                foreach ($files as $file) {
                    $_files->push($file->q_id);
                }
            });

            if ($isRange){
                Play::where('stream_id', $stream_id)->whereIn('file_id', $_files->toArray())
                    ->where('datatimestamp', '>=', Carbon::parse($start)->timestamp)
                    ->where('datatimestamp', '<=', Carbon::parse($end)->addDay()->timestamp)
                    ->with('file')->chunk(500, function ($plays) use($_plays){
                    $this->handleBroadcasterPlays($plays, $_plays);
                });

                return $_plays;
            }

            Play::where('stream_id', $stream_id)->whereIn('file_id', $_files->toArray())->whereDate('created_at', $start)->with('file')->chunk(500, function ($plays) use($_plays){
                $this->handleBroadcasterPlays($plays, $_plays);
            });

            return $_plays;
        }

    }

    public function handleBroadcasterPlays($plays, $_plays)
    {
        foreach ($plays as $play) {
            $file = File::where('q_id', $play->file_id)->with('artist', 'artists', 'album')->first();
            $artists = [];
            foreach ($file->artists as $artist) {
                array_push($artists, $artist->nick_name);
            }
            $_plays->push([
                'title'     =>  $file->title,
                'artist'    =>  array_merge([$file->artist->nick_name], $artists),
                'album'     =>  $file->album['name'],
                'played_at' =>  $play->created_at->toDateTimeString(),
            ]);
        }
    }

	public function playsOfContent()
	{
		set_time_limit(120);
        $user = Auth::user();

		if ($user->role === 'master' || $user->role === 'seer'){
		    $data = [
		        'user'      =>  $user,
                'artists'   =>  Artist::select('id', 'nick_name')->orderBy('nick_name')->get()
            ];
        } else if ($user->type === 'record-label'){
		    $data = [
		        'user'      =>  $user,
                'artists'   =>  $user->artists()->select('artists.id', 'nick_name')->orderBy('nick_name')->get()
            ];
        } else {
            $artists = [];

            foreach ($user->files()->with('artists')->cursor() as $file) {
                foreach ($file->artists as $artist) {
                    array_push($artists, ['id' => $artist->id, 'nick_name' => $artist->nick_name]);
                }
            }

            $data = [
                'user'      =>  $user,
                'artists'   =>  $artists
            ];
        }

		return view('pages.content-reports', $data);
    }

    public static function getArtistSongs($id = null)
    {
        $all_songs = collect();

        if (is_null($id)){

            Auth::user()->files()->select('q_id', 'title')->orderBy('title')->chunk(500, function ($songs) use ($all_songs) {
                foreach ($songs as $song) {
                    $all_songs->push($song);
                }
            });
            return $all_songs;

        }

        Artist::find($id)->files()->select('q_id', 'title')->orderBy('title')->chunk(500, function ($songs) use ($all_songs) {
            foreach ($songs as $song) {
                $all_songs->push($song);
            }
        });

        File::where('artist_id', $id)->select('q_id', 'title')->orderBy('title')->chunk(500, function ($songs) use ($all_songs) {
            foreach ($songs as $song) {
                $all_songs->push($song);
            }
        });
        return $all_songs;
    }

	public function getContentPlays($file_id, $start, $end)
	{
	    $isRange = Carbon::parse($start)->diffInDays(Carbon::parse($end));
	    if ($isRange){
	        return File::where('q_id', $file_id)->first()->plays()->where('datatimestamp', '>=', Carbon::parse($start)->timestamp)->where('datatimestamp', '<=', Carbon::parse($end)->addDay()->timestamp)->with('broadcaster')->get();
        }
		return File::where('q_id', $file_id)->first()->plays()->whereDate('created_at', $start)->with('broadcaster')->get();
	}
}
