<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Top30 extends Job
{
	protected $month;
    /**
     * Create a new job instance.
     * @param $month
     * @return void
     */
    public function __construct($month)
    {
        $this->month = Carbon::parse($month);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return \App\Top30::createForMonth($this->month);
    }
}
