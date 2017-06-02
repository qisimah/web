<?php

namespace App\Console\Commands;

use App\File;
use Illuminate\Console\Command;

class UploadToAcr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fingerprint:ad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload ad to ACR Cloud';

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
		$file = File::where('indexed', 0)->orwhere('indexed', 2)->first();
		if ($file){
            return File::toACR($file, ($file->file_type === 'ad')? 'ads' : 'music');
        }
    }
}
