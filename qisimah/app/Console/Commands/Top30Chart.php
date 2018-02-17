<?php

namespace App\Console\Commands;

use App\Jobs\Top30;
use App\Jobs\Top30TillDate;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Top30Chart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chart:top30 {date} {reset?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new top 30 chart';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	if ($this->argument('reset')){
    		$job = new Top30TillDate();
    		dispatch($job);
		} else {
			$job = new Top30(Carbon::today());
			dispatch($job);
		}
    }
}
