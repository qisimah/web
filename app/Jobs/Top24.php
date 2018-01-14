<?php

namespace App\Jobs;

use App\Chart;
use Carbon\Carbon;
use Illuminate\Queue\Jobs\Job;

class Top24 extends Job
{
    private $top24;
    private $country_id;
    private $date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($country_id, $date = null)
    {
        $this->top24 = new \App\Top24();
        $this->country_id = $country_id;
        $this->date = ($date)? Carbon::parse($date) : Carbon::today();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $entries = Chart::top24(1, $this->date);
        \App\Top24::whereDate('chart_date', $this->date->toDateString())->delete();
        foreach ($entries as $entry) {
            \App\Top24::create($entry);
        }
        echo 'Top 24 for '.$this->date->toDateString().' successfully created!'."\r\n";
    }
}
