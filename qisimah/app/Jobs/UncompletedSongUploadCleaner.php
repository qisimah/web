<?php

namespace App\Jobs;

use App\File;
use Illuminate\Queue\Jobs\Job;

class UncompletedSongUploadCleaner extends Job
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
        foreach (File::where('title', '')->cursor() as $file) {
            if ($file->created_at->diffInMinutes() > 10) {
                $file->delete();
                if (file_exists('../'.$file->audio)) {
                    unlink('../'.$file->audio);
                }
            }
        }
    }
}
