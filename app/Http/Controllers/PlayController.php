<?php

namespace App\Http\Controllers;

use App\Broadcaster;
use App\Detection;
use App\Play;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
		$this->middleware('auth');
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
        //
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
		return Detection::getTodaysPlay();
    }

	public function getPlays( $day )
	{
		$dates = explode('_', $day);
		return (count($dates) == 1)? Detection::getPlaysForSpecificDay($day) : Detection::getPlaysForDateRange($dates[0], $dates[1]);
    }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function playsOfBroadcaster()
	{
		return view('pages.broadcaster-reports', ['user' => Auth::user(), 'broadcasters' => Broadcaster::all()]);
    }

	public function getPlaysOfBroadcaster( $stream_id, $date )
	{
		return Detection::getPlaysOfBroadcaster($stream_id, $date);
    }

	public function playsOfContent()
	{
		set_time_limit(120);
		if (Auth::user()->type <> 'admin') {
			$userFiles = Auth::user()->files()->pluck( 'acr_id' );

			Detection::whereIn('acr_id', $userFiles)->with('artists', 'broadcaster')->groupBy('title')->orderBy('title')->chunk(500, function ($records){
				foreach ( $records as $record ) {
					$record['artists'] 		= (isset($record['artists'][0]))? $record['artists'][0]['name'] : 'Artist';
					$record['broadcaster'] 	= (isset($record['broadcaster']))? $record['broadcaster']['name'] : 'Broadcaster';
					$this->setContents($record);
				}
			});

			return view('pages.content-reports', ['user' => Auth::user(), 'contents' => $this->getContents()]);

		}

		Detection::with('artists', 'broadcaster')->groupBy('title')->orderBy('title')->chunk(500, function ($records){
			foreach ( $records as $record ) {
				$record['artists'] 		= (isset($record['artists'][0]))? $record['artists'][0]['name'] : 'Artist';
				$record['broadcaster'] 	= (isset($record['broadcaster']))? $record['broadcaster']['name'] : 'Broadcaster';
				$this->setContents($record);
			}
		});

		return view('pages.content-reports', ['user' => Auth::user(), 'contents' => $this->getContents()]);
    }

	public function getPlaysOfContent( $acr_id, $date )
	{
		$detection = new Detection();
		return $detection->getPlaysOfContent($acr_id, $date);
	}
}
