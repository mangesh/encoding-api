<?php

namespace App\Jobs;

use App\Video;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EncodeVideo extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        echo "Handle - Start \n";
        print_r($this->video->id);
        //$this->video->status = "Processed";
        //$this->video->save();
        echo "Handle - End \n";
    }

    public function data(){
        return $this->video;
    }

    public function video_update($data){
        //$this->video->status = "Processed";
    }
}
