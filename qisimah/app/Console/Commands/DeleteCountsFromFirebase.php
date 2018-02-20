<?php

namespace App\Console\Commands;

use App\QisimahBase;
use Illuminate\Console\Command;

class DeleteCountsFromFirebase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play:deletecounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command deletes all most played songs from firebase at a minute before midnight';

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
        return QisimahBase::deleteData('counts');
    }
}
