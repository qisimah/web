<?php

namespace App\Jobs;

use App\Chart;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Top7 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $carbon;
    private $top7;
    private $country_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($country_id, Carbon $carbon)
    {
        $this->carbon = $carbon;
        $this->top7 = new \App\Top7();
        $this->country_id = $country_id;
    }

    /**
     * Execute the job.
     *
     *
     */
    public function handle()
    {
        $entries = Chart::top7($this->country_id, $this->carbon);
        foreach ($entries as $entry) {
            \App\Top7::create($entry);
        }
        return Chart::top7($this->country_id, $this->carbon);
    }
}
