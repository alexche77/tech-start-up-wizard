<?php

namespace App\Jobs;

use App\Mail\StartupCreated;
use App\Models\StartUp;
use App\Models\User;
use GuzzleHttp\Exception\InvalidArgumentException;
use GuzzleHttp\Utils;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Whoops\Exception\ErrorException;
use function GuzzleHttp\json_encode;

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
        try {
            $this->startUp->sync_in_progress = true;
            $this->startUp->save();
            Log::info("Starting up!", [$this->startUp]);
            Mail::to(User::find($this->startUp->user_id))->send(new StartupCreated($this->startUp));
            /**
             * Here is where the magic happens
             * */
            //Get the features
            $features = $this->startUp->features()->with(['positions'])->get()->all();
            $apiURL = config('app.torre_api_url');
            Log::info('We are requesting ' . $apiURL . ' API for the following features', ['features' => $features]);
            foreach ($features as $feature) {
                $positionsForFeature = $feature->positions()->get()->all();
                foreach ($positionsForFeature as $position) {
                    Log::info("Searching candidates with keywords", ['position' => $position->name, 'keywords' => $position->role_keywords]);
                    $role_terms = [];
                    //['and'=>[['role'=>['term'=>'Android']]]]
//                foreach ($position->role_keywords as $keyword) {
//
//                }
                    $data = [
                        'and' => [
                            [
                                'role' => [
                                    'term' => $position->name,
                                ]
                            ],
                            [
                                'periodicity' => [
                                    'term' => 'monthly'
                                ]
                            ],
                            [
                                'opento' => [
                                    'term' => 'full-time-employment'
                                ]
                            ]
                        ]
                    ];
                    Log::info("Searching with body", ['body' => $data]);
                    $results = Http::post($apiURL . '/people/_search/?offset=0&size=50', $data)['results'];
                    $usernames = [];
                    foreach ($results as $result) {
                        $compensations = $result['compensations'];
                        if (isset($compensations['employee']) && $compensations['employee']['periodicity'] === 'monthly' && $compensations['employee']['currency'] === 'USD$') {
                            $montlhyCompensation = $compensations['employee'];
                            Log::info("Match found", ['position' => $position->name, 'compensations' => $montlhyCompensation, 'username' => $result['username'], 'professionalHeadline' => $result['professionalHeadline']]);
                            array_push($usernames, $result['username']);
                        }
                    }
                    Log::info('Saving usernames to feature', $usernames);
                    $feature->positions()->sync([]);
                    $feature->positions()->attach($position->id, ['usernames' => Utils::jsonEncode($usernames)]);
                }
            }
            $this->startUp->sync_in_progress = false;
            $this->startUp->save();
            Log::info("Finished!", [$this->startUp]);
        } catch (\Exception | \Throwable | InvalidArgumentException $e) {
            Log::error($e);
            $this->startUp->sync_in_progress = false;
            $this->startUp->save();
        }

    }
}
