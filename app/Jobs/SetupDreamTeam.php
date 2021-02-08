<?php

namespace App\Jobs;

use App\Mail\StartupCreated;
use App\Models\StartUp;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SetupDreamTeam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $startUp;

    /**
     * Create a new job instance.
     *
     * @param StartUp $startUp
     */
    public function __construct(StartUp $startUp)
    {
        $this->startUp = $startUp;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->startUp->sync_in_progress = true;
        $this->startUp->save();
        Log::info("Starting up!", [$this->startUp]);
        Mail::to(User::find($this->startUp->user_id))->send(new StartupCreated($this->startUp));
        /**
         * Here is where the magic happens
         * */

        //Get the features
        $features = $this->startUp->features()->get();
        Log::info('We are requesting torre.co API for the following features');
        $this->startUp->sync_in_progress = false;
        $this->startUp->save();
        Log::info("Finished!", [$this->startUp]);
    }
}
