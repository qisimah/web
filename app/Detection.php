<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Detection extends Model
{
    //
	protected $fillable = [
		'stream_id',
		'album',
		'type',
		'label',
		'title',
		'release_date',
		'created_at',
		'artist',
		'external_metadata',
		'acr_id'
	];

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
			$this->contents = [];
		} else {
			array_push($this->contents, $contents);
		}
	}

	function __construct()
	{
		set_time_limit(120);
		$this->setContents([]);
	}

	public function artists(){
		return $this->belongsToMany('App\Artist')->withTimestamps();
	}

	public function genres()
	{
		return $this->belongsToMany('App\Genre')->withTimestamps();
	}

	public function label()
	{
		return $this->hasMany(Label::class);
	}

	public function countable(){
		return $this->hasOne(Count::class, 'acr_id', 'acr_id');
	}

	public function broadcaster()
	{
		return $this->hasOne(Broadcaster::class, 'stream_id', 'stream_id');
	}

	public static function getPlaysForDay( $day = null)
	{
		$the_day = ($day <> null)? $day : Carbon::today();
		$user = Auth::user();
		if ($user->type <> 'admin'){
			$detection = new Detection();
			return $detection->getUserPlaysForDay($user, $the_day);
		}

		$plays_today 	= Detection::whereDate('created_at', $the_day)->count();
		$mostPlayed  	= Detection::select(DB::raw('count(*) as plays, title, id'))
			->with('artists')
			->whereDate('created_at', $the_day)
			->groupBy('title')
			->orderBy('plays', 'desc')
			->latest('created_at')
			->first();
		$all_time_best 	= Count::with('detections')->orderBy('count', 'desc')->first();
		$all_time_best['artists'] = $all_time_best->detections->artists()->get();

		$plays = [];

		foreach (Detection::with('artists', 'broadcaster')
					 ->whereDate('created_at', $the_day)
					 ->orderBy('created_at', 'desc')
					 ->limit(20)->get()->toArray() as $play ) {
			array_push($plays, [
				'broadcaster' 	=> $play['broadcaster']['name'].', '.$play['broadcaster']['country'],
				'title'			=> $play['title'],
				'artist'		=> (isset($play['artists'][0]))? $play['artists'][0]['name'] : 'Artist',
				'played'		=> Carbon::parse($play['created_at'])->diffForHumans()
			]);
		}

		$best_broadcaster = Detection::with('broadcaster')->select(DB::raw('count(*) as plays, stream_id'))
			->whereDate('created_at', $the_day)
			->groupBy('stream_id')
			->orderBy('plays', 'desc')
			->first();
		return [$plays_today, $mostPlayed, $all_time_best, $best_broadcaster, $plays];
	}

	public function getUserPlaysForDay( $user, $day )
	{
		$userFiles 		= $user->files()->pluck('acr_id');
		$plays_today 	= Detection::whereIn('acr_id', $userFiles)
			->whereDate('created_at', $day)
			->orderBy('created_at', 'desc')
			->count();

		$mostPlayed  	= Detection::select(DB::raw('count(*) as plays, title, id'))
			->whereIn('acr_id', $userFiles)
			->with('artists')
			->whereDate('created_at', $day)
			->groupBy('title')
			->orderBy('plays', 'desc')
			->latest('created_at')
			->first();

		$all_time_best 	= Count::with('detections')
			->whereIn('acr_id', $userFiles)
			->orderBy('count', 'desc')
			->first();
		$all_time_best['artists'] = $all_time_best->detections->artists()->get();

		$plays = [];

		foreach (Detection::with('artists', 'broadcaster')
					 ->whereIn('acr_id', $userFiles)
					 ->whereDate('created_at', $day)
					 ->orderBy('created_at', 'desc')
					 ->limit(20)->get()->toArray() as $play ) {
			array_push($plays, [
				'broadcaster' 	=> $play['broadcaster']['name'].', '.$play['broadcaster']['country'],
				'title'			=> $play['title'],
				'artist'		=> (isset($play['artists'][0]))? $play['artists'][0]['name'] : 'Artist',
				'played'		=> Carbon::parse($play['created_at'])->diffForHumans()
			]);
		}

		$best_broadcaster = Detection::with('broadcaster')->select(DB::raw('count(*) as plays, stream_id'))
			->whereIn('acr_id', $userFiles)
			->whereDate('created_at', $day)
			->groupBy('stream_id')
			->orderBy('plays', 'desc')
			->first();

		return [$plays_today, $mostPlayed, $all_time_best, $best_broadcaster, $plays];
	}

	public static function getTodaysPlay()
	{
		return Detection::getPlaysForDay();
	}

	public static function getPlaysForSpecificDay( $day )
	{
		$plays = [];
		if (Auth::user()->type <> 'admin'){
			$userFiles 		= Auth::user()->files()->pluck('acr_id');

			foreach ( Detection::whereDate('created_at', $day)->whereIn('acr_id', $userFiles)->with('artists', 'broadcaster')->orderBy('created_at', 'asc')->get()->toArray() as $play ) {
				array_push($plays, [
					'broadcaster' 	=> $play['broadcaster']['name'].', '.$play['broadcaster']['country'],
					'title'			=> $play['title'],
					'artist'		=> (isset($play['artists'][0]))? $play['artists'][0]['name'] : 'Artist',
					'played'		=> $play['created_at']
				]);
			}
		} else {
			foreach ( Detection::whereDate('created_at', $day)->with('artists', 'broadcaster')->orderBy('created_at', 'asc')->get()->toArray() as $play ) {
				array_push($plays, [
					'broadcaster' 	=> $play['broadcaster']['name'].', '.$play['broadcaster']['country'],
					'title'			=> $play['title'],
					'artist'		=> (isset($play['artists'][0]))? $play['artists'][0]['name'] : 'Artist',
					'played'		=> $play['created_at']
				]);
			}
		}

		return $plays;
	}

	public static function getPlaysForDateRange( $start, $end )
	{
		$plays = [];
		if (Auth::user()->type <> 'admin') {
			$userFiles = Auth::user()->files()->pluck( 'acr_id' );
			foreach ( Detection::whereIn('acr_id', $userFiles)->whereBetween( 'created_at', [ Carbon::parse( $start ), Carbon::parse( $end )->addDay() ] )->with( 'artists', 'broadcaster' )->orderBy( 'created_at', 'asc' )->get()->toArray() as $play ) {
				array_push( $plays, [
					'broadcaster' => $play[ 'broadcaster' ][ 'name' ] . ', ' . $play[ 'broadcaster' ][ 'country' ],
					'title' => $play[ 'title' ],
					'artist' => ( isset( $play[ 'artists' ][ 0 ] ) ) ? $play[ 'artists' ][ 0 ][ 'name' ] : 'Artist',
					'played' => $play[ 'created_at' ]
				] );
			}
		} else {
			foreach ( Detection::whereBetween( 'created_at', [ Carbon::parse( $start ), Carbon::parse( $end )->addDay() ] )->with( 'artists', 'broadcaster' )->orderBy( 'created_at', 'asc' )->get()->toArray() as $play ) {
				array_push( $plays, [
					'broadcaster' => $play[ 'broadcaster' ][ 'name' ] . ', ' . $play[ 'broadcaster' ][ 'country' ],
					'title' => $play[ 'title' ],
					'artist' => ( isset( $play[ 'artists' ][ 0 ] ) ) ? $play[ 'artists' ][ 0 ][ 'name' ] : 'Artist',
					'played' => $play[ 'created_at' ]
				] );
			}
		}
		return $plays;
	}

	public static function getPlaysOfBroadcaster( $stream_id, $date )
	{
		$detection = new Detection();
		$date_range = explode('_', $date);

		if (Auth::user()->type <> 'admin') {
			$userFiles = Auth::user()->files()->pluck( 'acr_id' );
			if (count($date_range) === 2){
				$detections = Detection::where('stream_id', $stream_id)
					->whereIn('acr_id', $userFiles)
					->whereBetween('created_at', [Carbon::parse($date_range[0]), Carbon::parse($date_range[1])->addDay()])
					->with('artists')
					->orderBy('created_at', 'desc')
					->get()->toArray();
				return $detection->handleBroadcasterPlays($detections);
			}
			$detections = Detection::where('stream_id', $stream_id)
				->whereIn('acr_id', $userFiles)
				->whereDate('created_at', Carbon::parse($date))
				->with('artists')
				->orderBy('created_at', 'desc')
				->get()->toArray();
			return $detection->handleBroadcasterPlays($detections);
		}

		if (count($date_range) === 2){
			$detections = Detection::where('stream_id', $stream_id)
				->whereBetween('created_at', [Carbon::parse($date_range[0]), Carbon::parse($date_range[1])->addDay()])
				->with('artists')
				->orderBy('created_at', 'desc')
				->get()->toArray();
			return $detection->handleBroadcasterPlays($detections);
		}
		$detections = Detection::where('stream_id', $stream_id)
			->whereDate('created_at', Carbon::parse($date))
			->with('artists')
			->orderBy('created_at', 'desc')
			->get()->toArray();
		return $detection->handleBroadcasterPlays($detections);
	}

	private function handleBroadcasterPlays($detections){
		$sorted = [];
		foreach ( $detections as $detection ) {
			$record['title'] 	= $detection['title'];
			$record['album'] 	= (isset($detection['album']))? $detection['album']: 'Album';
			$record['played'] 	= $detection['created_at'];
			$record['artist'] 	= (isset($detection['artists'][0]))? $detection['artists'][0]['name'] : 'Artist';
			array_push($sorted, $record);
		}
		return $sorted;
	}

	public function getPlaysOfContent( $acr_id, $date )
	{
		$date_range = explode('_', $date);
		if (count($date_range) === 2){
			Detection::where('acr_id', $acr_id)
				->whereBetween('created_at', [Carbon::parse($date_range[0]), Carbon::parse($date_range[1])->addDay()])
				->with('broadcaster')
				->chunk(100, function ($records){
					$this->handlePlaysOfContent($records);
				});

			return $this->getContents();
		}

		Detection::where('acr_id', $acr_id)->whereDate('created_at', $date)->with('broadcaster')->chunk(100, function ($records){
			$this->handlePlaysOfContent($records);
		});
		return $this->getContents();
	}

	private function handlePlaysOfContent($records){
		foreach ( $records as $record ) {
			$new['name'] 		= (isset($record->broadcaster->name))	? 	$record->broadcaster->name : 'Name';
			$new['location'] 	= (isset($record->broadcaster->country))?  	$record->broadcaster->country : 'country';
			$new['location'] 	= (isset($record->broadcaster->city))	?  	$record->broadcaster->city." - ".$new['location'] : 'city';
			$new['reach'] 		= (isset($record->broadcaster->reach))	? 	$record->broadcaster->reach : 'Reach';
			$new['played']		= Carbon::parse($record->created_at)->toDateTimeString();
			$this->setContents($new);
		}
	}

	public static function getAllTimeBest()
	{

	}
}
