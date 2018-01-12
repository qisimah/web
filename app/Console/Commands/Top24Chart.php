<?php

namespace App\Console\Commands;

use App\Chart;
use App\Jobs\Top24;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Top24Chart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chart:top24 {date} {reset?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new top 24 charts';

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
        $date = $this->argument('date');
        $date = ($date)? $date : date('Y-m-d');
        if ($this->argument('reset')) {
            $start = Carbon::parse('2017-01-01');
            $days = $start->diffInDays();
            for ($i = 0; $i < $days; $i++){
                $job = new Top24(1, Carbon::parse('2017-01-01')->addDays($i));
                dispatch($job);
            }
        }
        $job = new Top24(1, Carbon::parse($date));
        dispatch($job);
    }
}
