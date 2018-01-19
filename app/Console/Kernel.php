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
        'App\Console\Commands\Top24Chart',
        'App\Console\Commands\Top7Chart',
		'App\Console\Commands\Top30Chart'
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
        $top24	= 'chart:top24 '.date('Y-m-d');
        $top7	= 'chart:top7 '.date('Y-m-d');
        $top30 	= 'chart:top30 '.date('Y-m-d');
		$schedule->command('fingerprint:ad')->everyMinute();
		$schedule->command('play:countDownToday')->everyTenMinutes();
		$schedule->command('play:deletecounts')->dailyAt('23:59');
		$schedule->command($top24)->dailyAt('23:59')->emailOutputTo('admin@qisimah.com');
		$schedule->command($top7)->sundays()->at('23:59')->emailOutputTo('admin@qisimah.com');
		$schedule->command($top30)->monthlyOn((int) date('t'), '23:59')->emailOutputTo('braasig@gmail.com');
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
