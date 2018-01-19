<?php

namespace App;

use App\Events\GetUpdatesOnPlays;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Play extends Model
{
    protected $fillable = ['file_id', 'stream_id', 'created_at', 'datatimestamp', 'synced', 'sync_today_count'];

    //
    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'q_id');
    }

    public function broadcaster()
    {
        return $this->belongsTo(Broadcaster::class, 'stream_id', 'stream_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    /**
     * @return mixed
     * get count of the present day
     */
    public static function countTodayPlays()
    {
        if (Auth::user()->type <> 'admin') {
            return [Play::whereIn('file_id', User::getUserFiles())->whereDate('created_at', Carbon::today()->toDateString())->count()];
        }
        return [Play::whereDate('created_at', Carbon::today()->toDateString())->count()];
    }

    /**
     * @return array
     * get most plays song for the present day
     */
    public static function countMostPlayed()
    {
        if (Auth::user()->type <> 'admin') {
            $most_played = Play::select(DB::raw('count(*) as plays, file_id'))->whereIn('file_id', User::find(Auth::id())->files()->pluck('q_id'))->whereDate('created_at', Carbon::today()->toDateString())->groupBy('file_id')->orderBy('plays', 'desc')->first();
            if ($most_played) {
                return [$most_played->plays, File::where('q_id', $most_played->file_id)->with('artist')->get()];
            }
            return [0, []];
        }

        $most_played = Play::select(DB::raw('count(*) as plays, file_id'))->whereDate('created_at', Carbon::today()->toDateString())->groupBy('file_id')->orderBy('plays', 'desc')->first();
        if ($most_played) {
            return [$most_played->plays, File::where('q_id', $most_played->file_id)->with('artist')->get()];
        }
        return [0, []];
    }

    /**
     * @return array
     * get all time best play
     */
    public static function countAllTimePlayed()
    {
        if (Auth::user()->type <> 'admin') {
            $all_time_played = Play::select(DB::raw('count(*) as plays, file_id'))->whereIn('file_id', User::find(Auth::id())->files()->pluck('q_id'))->groupBy('file_id')->orderBy('plays', 'desc')->first();
            return [$all_time_played->plays, File::where('q_id', $all_time_played->file_id)->with('artist')->get()];
        }

        $all_time_played = Play::select(DB::raw('count(*) as plays, file_id'))->groupBy('file_id')->orderBy('plays', 'desc')->first();
        return [(int)$all_time_played->plays, File::where('q_id', $all_time_played->file_id)->with('artist')->get()];
    }

    public static function countBroadcasterPlays()
    {
        if (Auth::user()->type <> 'admin') {
            $top_broadcaster = Play::select(DB::raw('stream_id, count(stream_id) as plays'))->whereIn('file_id', User::find(Auth::id())->files()->pluck('q_id'))->whereDate('created_at', Carbon::today()->toDateString())->groupBy('stream_id')->orderBy('plays', 'desc')->first();
            if ($top_broadcaster) {
                return [$top_broadcaster->plays, Broadcaster::where('stream_id', $top_broadcaster->stream_id)->first()];
            }
            return [0, []];
        }

        $top_broadcaster = Play::select(DB::raw('stream_id, count(stream_id) as plays'))
            ->whereDate('created_at', Carbon::today()->toDateString())
            ->groupBy('stream_id')
            ->orderBy('plays', 'desc')
            ->first();
        if ($top_broadcaster) {
            return [$top_broadcaster->plays, Broadcaster::where('stream_id', $top_broadcaster->stream_id)->first()];
        }
        return [0, ['name' => 'broadcaster', 'frequency' => '000.00 MHz', 'city' => 'city']];
    }

    public static function songsPlayedToday()
    {
        if (!in_array(Auth::user()->role, ['master', 'seer'])) {
            $songs = Play::whereIn('file_id', User::getUserFiles())
                ->whereDate('created_at', Carbon::today()->toDateString())
                ->with('broadcaster', 'file')
                ->orderBy('created_at', 'desc')
                ->limit(20)
                ->get();
        } else {
            $songs = Play::whereDate('created_at', Carbon::today()->toDateString())
                ->with('broadcaster', 'file')
                ->orderBy('created_at', 'desc')
                ->limit(20)
                ->get();
        }

        $_plays = [];

        foreach ($songs as $song) {
            array_push($_plays, Play::liveFeed($song->file, $song->broadcaster, $song));
        }
        return $_plays;
    }

    public static function getTopBroadcaster()
    {
        $topBroadcaster = Play::select(DB::raw('id, file_id, stream_id, count(stream_id) as plays, datatimestamp'))
            ->whereDate('created_at', Carbon::today()->toDateString())
            ->groupBy('stream_id')->orderBy('plays', 'desc')->first();
        $topBroadcaster['broadcaster'] = Broadcaster::where('stream_id', $topBroadcaster['stream_id'])->first();
        Play::syncTopBroadcasterWithFirebase($topBroadcaster);
    }

    public static function syncTopBroadcasterWithFirebase($play)
    {
        $play = (is_array($play)) ? $play : $play->toArray();
        QisimahBase::saveData('top_broadcaster', $play['file_id'], $play);
        echo 'Play ' . $play['file_id'] . ' synced successfully @ ' . Carbon::now() . "\n";
    }

    public static function countDownToday($unsynced = true)
    {
        $all = [];
        if ($unsynced) {
            Play::select(DB::raw('id, stream_id, file_id, count(file_id) as plays, datatimestamp, created_at'))
                ->with('broadcaster')->whereDate('created_at', Carbon::today()->toDateString())
                ->where('sync_today_count', 0)->groupBy('file_id')->orderBy('plays', 'desc')
                ->chunk(20, function ($plays) {
                    Play::handleCountDownToday($plays);
                });

        } else {
            Play::select(DB::raw('id, stream_id, file_id, count(file_id) as plays, datatimestamp, created_at'))
                ->with('broadcaster')
                ->whereDate('created_at', Carbon::today()->toDateString())
                ->groupBy('file_id')->orderBy('plays', 'desc')
                ->chunk(20, function ($plays) {
                    Play::handleCountDownToday($plays);
                });
        }

    }

    public static function handleCountDownToday($plays)
    {
        $all = [];
        $broadcaster_play = [];
        foreach ($plays as $play) {
            $_this_artists = [];
            $_this_producers = [];
            $_this = File::with('artists', 'producers', 'album', 'label')->where('q_id', $play->file_id)->first()->toArray();
            $artists = $_this['artists'];
            $producers = $_this['producers'];
            $album = $_this['album'];
            $broadcaster = $play['broadcaster'];

            foreach ($artists as $artist) {
                array_push($_this_artists, $artist['nick_name']);
            }

            foreach ($producers as $producer) {
                array_push($_this_producers, $producer['nick_name']);
            }

            array_push($all, [
                'id' => $play['file_id'],
                'play_id' => $play['id'],
                'title' => $_this['title'],
                'album' => $album,
                'label' => $_this['label'],
                'artists' => $_this_artists,
                'producers' => $_this_producers,
                'plays' => intval($play['plays']),
                'datatimestamp' => intval($play['datatimestamp']),
                'created_at' => $play['created_at']
            ]);
        }

        foreach ($all as $item) {
            QisimahBase::saveData('counts', $item['id'], $item);
            $file = Play::find($item['play_id']);
            $file->sync_today_count = 1;
            $file->save();

            Play::getBroadcasterPlays();

            QisimahBase::saveData('broadcaster_plays', $broadcaster->stream_id, [$broadcaster_play['play_id'] => $broadcaster_play]);
            Play::getTopBroadcaster();
        }
    }

    public static function countDownAll($unsynced = true)
    {
        $all = [];
        if (is_int($unsynced)) {
            $plays = Play::select(DB::raw('file_id, count(file_id) as plays, datatimestamp'))->where('sync_all_time', 0)->groupBy('file_id')->orderBy('plays', 'desc')->get();
        } else {
            $plays = Play::select(DB::raw('file_id, count(file_id) as plays, datatimestamp'))->groupBy('file_id')->orderBy('plays', 'desc')->get();
        }

        foreach ($plays as $play) {
            $_this_artists = [];
            $_this_producers = [];
            $_this = File::with('artists', 'producers')->where('q_id', $play->file_id)->first()->toArray();
            $artists = $_this['artists'];
            $producers = $_this['producers'];

            foreach ($artists as $artist) {
                array_push($_this_artists, $artist['nick_name']);
            }

            foreach ($producers as $producer) {
                array_push($_this_producers, $producer['nick_name']);
            }

            array_push($all, [
                'id' => $play['file_id'],
                'title' => $_this['title'],
                'artists' => $_this_artists,
                'producers' => $_this_producers,
                'plays' => intval($play['plays']),
                'datatimestamp' => intval($play['datatimestamp'])
            ]);
        }

        foreach ($all as $play) {
            QisimahBase::saveData('allTimeCounts', $play['id'], $play);
        }
    }

    public static function savePlay($play)
    {
        return Play::create($play);
    }

    public static function getBroadcasterPlays($synced = false)
    {
        if ($synced) {
            foreach (Play::cursor() as $play) {
                Play::syncBroadcasterPlays($play);
            }
        } else {
            foreach (Play::where('sync_broadcaster_plays', 0)->cursor() as $play) {
                Play::syncBroadcasterPlays($play);
            }
        }
    }

    public static function syncBroadcasterPlays($play)
    {
        $broadcaster = Broadcaster::where('stream_id', $play->stream_id)->first();
        $file = File::where('q_id', $play->file_id)->with('artist', 'artists', 'album', 'label')->first();
        $artists = [];

        foreach ($file->artists as $item) {
            array_push($artists, $item->nick_name);
        }

        array_merge([$file->artist->nick_name], $artists);

        $broadcaster_play = [];
        $broadcaster_play['created_at'] = $play->created_at->toDateTimeString();
        $broadcaster_play['file_id'] = $play->file_id;
        $broadcaster_play['played_at'] = intval($play->datatimestamp);
        $broadcaster_play['title'] = $file->title;
        $broadcaster_play['city'] = $broadcaster->city;
        $broadcaster_play['frequency'] = $broadcaster->frequency;
        $broadcaster_play['name'] = $broadcaster->name;
        $broadcaster_play['album'] = $file->album->name;
        $broadcaster_play['artists'] = $artists;
        $broadcaster_play['stream_id'] = $broadcaster->stream_id;
        $broadcaster_play['play_id'] = $play->id;

        QisimahBase::pushData('broadcaster_plays/' . $broadcaster->stream_id, $broadcaster_play);
        $play->sync_broadcaster_plays = 1;
        $play->save();

    }

    public static function syncAllWithFirebase()
    {
        foreach (Play::cursor() as $play) {
            Play::synchronize('plays', $play);
            echo $play->id . " Synced successfully @ " . date('Y-m-d H:s:i') . "\n";
        }
        return true;
    }

    public static function syncWithFirebase()
    {
        foreach (Play::where('synced', 0)->cursor() as $play) {
            Play::synchronize('plays', $play);
            echo $play->id . " Synced successfully @ " . date('Y-m-d H:s:i') . "\n";
        }
        return true;
    }

    public static function updateWithDataTimeStamp()
    {
        foreach (Play::where('datatimestamp', 0)->cursor() as $play) {
            $play->datatimestamp = intval(strtotime($play->created_at));
            $play->synced = 0;
            $play->save();
            echo $play->id . " Updated @ " . date('Y-m-d H:s:i') . "\n";
        }
        return true;
    }

    public static function synchronize($ref, $play)
    {
        $play = (is_array($play)) ? $play : $play->toArray();
        $play['file'] = File::where('q_id', $play['file_id'])->with('artists', 'genres')->first()->toArray();
        $play['broadcaster'] = Broadcaster::where('stream_id', $play['stream_id'])->first()->toArray();
        $play['datatimestamp'] = intval($play['datatimestamp']);
        QisimahBase::saveData($ref, $play['id'], $play);
        $_this = Play::find($play['id']);
        $_this->synced = 1;
        return $_this->save();
    }

    public static function getTodayPlays()
    {
        $plays = [];
        foreach (Play::with('file', 'broadcaster')->whereDate('created_at', Carbon::parse(Carbon::today()->toDateString()))->orderBy('created_at', 'asc')->cursor() as $play) {
            $rows = File::where('q_id', $play->file->q_id)->first()->artists;
            $artists = [];
            foreach ($rows as $row) {
                array_push($artists, $row->nick_name);
            }

            array_push($plays, [
                'title' => $play->file->title,
                'broadcaster' => $play->broadcaster->name,
                'artists' => $artists,
                'played_at' => Carbon::parse($play->created_at)->diffForHumans()
            ]);
        }
        return ['plays' => $plays];
    }

    public static function getPlays($start, $end)
    {
    	$_start = Carbon::parse($start);
    	$_end = Carbon::parse($end);
//    	$plays = [];

    	if (in_array(Auth::user()->role, ['master', 'seer'])){
			$query = Play::with('broadcaster', 'broadcaster.country', 'file', 'file.artist', 'file.artists:nick_name')
				->whereBetween('created_at', [
						$_start->startOfDay()->toDateTimeString(),
						$_end->endOfDay()->toDateTimeString()]
				);
		} else {
			$query = Play::with('broadcaster', 'broadcaster.country', 'file', 'file.artist', 'file.artists:nick_name')
				->whereIn('file_id', Auth::user()->files->pluck('q_id'))
				->whereBetween('created_at', [
					$_start->startOfDay()->toDateTimeString(),
					$_end->endOfDay()->toDateTimeString()]
				);
		}

		return $query->orderBy('created_at', 'asc')->paginate(20);
    }

    public static function handleGetPlays($plays, $_plays)
    {
        foreach ($plays as $play) {
            $_artists = collect();
            File::find($play->file->id)->artist()->select('nick_name')->chunk(20, function ($artists) use ($_artists) {
                foreach ($artists as $artist) {
                    $_artists->push($artist->nick_name);
                }

            });

            $_plays->push([
                'title' => $play->file->title,
                'artists' => $_artists,
                'broadcaster' => $play->broadcaster->name,
                'played_at' => $play->created_at->toDateTimeString()
            ]);
        }
        return $_plays;
    }

    public static function getRegionalPlays($country_id, $file_id, Carbon $start, Carbon $end)
    {
        $_regions = Region::where('country_id', $country_id)->get();
        $_total = 0;

//        return Play::select(DB::raw('count(*) as plays, stream_id'))->with('broadcasters')->where('file_id', $file_id)->groupBy('stream_id')->orderBy('plays', 'desc')->get();

        if ($end->diffInDays($start)){
            Play::select(DB::raw('count(*) as plays, stream_id'))->with('broadcaster')->where('file_id', $file_id)->whereBetween('created_at', [$start, $end])->groupBy('stream_id')->orderBy('plays', 'desc')->chunk(500, function ($plays) use ($_regions, $_total) {
                foreach ($plays as $play) {
                    $_total += (int)$play->plays;
                    foreach ($_regions as $region) {
                        if ($region->id == $play->broadcaster->region_id) {
                            $region->plays += (int)$play->plays;
                        }
                    }
                    $GLOBALS['_regions'] = $_regions;
                    $GLOBALS['_total'] = $_total;
                }
            });
        } else {
            Play::select(DB::raw('count(*) as plays, stream_id'))->with('broadcaster')->where('file_id', $file_id)->whereDate('created_at', $start)->groupBy('stream_id')->orderBy('plays', 'desc')->chunk(500, function ($plays) use ($_regions, $_total) {
                foreach ($plays as $play) {
                    $_total += (int)$play->plays;
                    foreach ($_regions as $region) {
                        if ($region->id == $play->broadcaster->region_id) {
                            $region->plays += (int)$play->plays;
                        }
                    }
                    $GLOBALS['_regions'] = $_regions;
                    $GLOBALS['_total'] = $_total;
                }
            });
        }

        return [$GLOBALS['_regions'], $GLOBALS['_total']];
    }

    public static function liveFeed(File $file, Broadcaster $broadcaster, Play $play)
    {
        $carbon_today = Carbon::today();
        return [
            'song'  =>  [
                'title'         => $file->title,
                'artists'       => implode(' / ', File::allArtists($file)),
                'img'           => $file->img,
            ],
            'broadcaster'   => $broadcaster->name.' - '.$broadcaster->frequency.' MHz, '.$broadcaster->country->name,
            'created_at'    => $play->created_at->toDateTimeString(),
            'plays_today'   => Play::where('file_id', $file->q_id)->whereDate('created_at', $carbon_today)->count(),
            'plays_this_week' => Play::where('file_id', $file->q_id)->whereBetween('created_at', [$carbon_today->startOfWeek()->toDateTimeString(), $carbon_today->endOfWeek()->toDateTimeString()])->count()
        ];
    }

}
