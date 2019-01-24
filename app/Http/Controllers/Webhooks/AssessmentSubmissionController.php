<?php

namespace App\Http\Controllers\Webhooks;

use App\Assessment;
use App\Jobs\GradeAssessment;
use App\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssessmentSubmissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $url = $request->json('repository.html_url');

        $assessment = Assessment::with(['students' => function($query) use ($request) {
            $query->orWhere([
                ['github_username', 'ilike', $request->json('pull_request.user.login')],
                ['zipcode_rocks_username', 'ilike', $request->json('pull_request.user.login')],
            ]);
        }])->where('url', $url)->first();

        if (!$assessment || !$assessment->students->first()) {
            return redirect()->route('api.fallback.404');
        }

        $submission = Submission::updateOrCreate([
            'assignment_id' => $assessment->students->first()->pivot->id,
        ], [
            'grade' => null,
            'latest_hash' => $request->json('pull_request.head.sha'),
            'submission_url' => $request->json('pull_request.head.repo.html_url'),
            'pr_url' => $request->json('pull_request.url', $request->json('pull_request.html_url')),
        ]);

        if ( $assessment->gradable ) {
            GradeAssessment::dispatchNow($submission);
        }

        return response('', 200);
    }
}

