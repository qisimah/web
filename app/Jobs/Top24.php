<?php

namespace App\Jobs;

use App\Broadcaster;
use App\Chart;
use App\ChartEntry;
use App\File;
use App\Play;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Top24
{
    private $top24;

    private $country_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($country_id)
    {
        $this->top24 = new \App\Top24();
        $this->country_id = $country_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $position = 1;
        $stream_ids = Broadcaster::getBroadcastersStreamIdsForCountry($this->country_id);
        $plays =  Play::select(DB::raw('file_id, count(*) as plays'))->whereIn('stream_id', $stream_ids)->whereDate('created_at', Carbon::today()->toDateString())->with('file')->groupBy('file_id')->orderBy('plays', 'desc')->limit(24)->get();
        foreach ($plays as $play) {
            $entry = new ChartEntry($play->file_id, $play->file->title, Chart::artistsNamesToString(File::allArtists($play->file)), Chart::arraysToString($play->file->producers()->pluck('nick_name')->toArray()), Chart::arraysToString($play->file->genres()->pluck('name')->toArray()), $play->file->release_date, $play->file->img, $play->file->audio, $play->plays, $position, 0, 1, $this->country_id, Carbon::today()->toDateString());
            $entry->getEntry()['duration']      = $entry->duration();
            $entry->getEntry()['peak_position'] = $entry->peakPosition();
            $entry->getEntry()['prev_position'] = $entry->previousPosition();
            $this->top24->create($entry->getEntry());
            $position++;
        }
    }
}
