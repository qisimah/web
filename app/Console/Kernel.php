<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\App;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
		'App\Console\Commands\UploadToAcr',
        'App\Console\Commands\SyncPlayCount',
        'App\Console\Commands\DeleteCountsFromFirebase',
        'App\Console\Commands\SyncAllTime',
        'App\Console\Commands\Top24Chart'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $top24 = 'chart:top24 '.date('Y-m-d');
		$schedule->command('fingerprint:ad')->everyMinute();
		$schedule->command('play:countDownToday')->everyTenMinutes();
		$schedule->command('play:deletecounts')->dailyAt('23:59');
		$schedule->command($top24)->dailyAt('23:59');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
