<?php

namespace App\Jobs;

use Log;
use App\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GradeAssessment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $submission;

    /**
     * Create a new job instance.
     *
     * @param Submission $submission
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::error('this wasn\'t supposed to be handled');
    }
}
