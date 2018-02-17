<?php

namespace App\Console\Commands;

use App\Play;
use Illuminate\Console\Command;

class SyncAllTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play:syncalltime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all time most played song with firebase';

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
        //
        return Play::countDownAll(true);
    }
}
