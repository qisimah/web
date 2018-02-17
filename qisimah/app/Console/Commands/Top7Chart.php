<?php

namespace App\Console\Commands;

use App\Jobs\Top7;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Top7Chart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chart:top7 {date} {reset?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new top 7 chart';

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
        $reset = $this->argument('reset');

        $date = ($date) ? $date : date('Y-m-d');

        if ($reset) {
            $weeks = Carbon::parse('2017-06-01')->diffInWeeks(Carbon::parse($date));
            for ($i = 0; $i < $weeks; $i++) {
                $week = Carbon::parse('2017-06-01')->addWeeks($i);

                $job = new Top7(1, $week);
                dispatch($job);
                echo 'Top 7 for '.$week->endOfWeek()->toDateString().' has been created successfully!'."\n";
            }
        } else {
            $job = new Top7(1, Carbon::parse($date));
            dispatch($job);
        }
    }
}
