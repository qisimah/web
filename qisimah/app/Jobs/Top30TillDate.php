<?php

namespace App\Jobs;

use Illuminate\Queue\Jobs\Job;

class Top30TillDate extends Job
{

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return \App\Top30::createTillDate();
    }
}
