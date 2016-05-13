<?php

namespace App\Providers;

use Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobFailed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Queue::before(function (JobProcessing $event) {
            // $event->connectionName
            // $event->job
            // $event->data
            echo "Encoding will start now" . $event->job->attempts() . "\n";
            $video          = unserialize($event->data['data']['command']);
            $video_model    = $video->data();
            $video_model->attempt   = $event->job->attempts();
            $video_model->status    = "processing";
            $video_model->save();
            echo "Encoding has started now \n";
        });

        Queue::after(function (JobProcessed $event) {
            // $event->connectionName
            // $event->job
            // $event->data
            echo "Encoding has finished \n";
            $video          = unserialize($event->data['data']['command']);
            $video_model    = $video->data();
            $video_model->status    = "procesed";
            $video_model->save();
            echo "Encoding has finished - End \n";
        });

        Queue::failing(function (JobFailed $event) {
            // $event->connectionName
            // $event->job
            // $event->data
            echo "Encoding has failed \n";
            $video          = unserialize($event->data['data']['command']);
            $video_model    = $video->data();
            $video_model->status    = "failed";
            $video_model->save();
            echo "Encoding has failed - End \n";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}