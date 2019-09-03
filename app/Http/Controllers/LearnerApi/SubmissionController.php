<?php

namespace App\Http\Controllers\LearnerApi;

use Log;
use Storage;
use Carbon\Carbon;
use App\Submission;
use App\Assignment;
use Illuminate\Http\Request;
use App\Jobs\GradeAssessment;
use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    /**
     * @param Request $request
     * @param $assignment_id
     *
     * @return App\Assignment
     */
    public function show(Request $request, $assignment_id)
    {
        $assignment = Assignment::with('assessment')->find($assignment_id);

        $user = $request->user();
        if ($user->student->id !== $assignment->student_id) {
            abort(404);
        }

        return $assignment;
    }

    /**
     * @param Request $request
     * @param $assignment_id
     *
     * @return App\Submission
     */
    public function store(Request $request, $assignment_id)
    {
        $assignment = Assignment::find($assignment_id);
        $assessment = $assignment->assessment;

        $user = $request->user();

        if ($user->student->id != $assignment->student_id) {
            abort(400);
        }

        $submission = Submission::updateOrCreate(
            ['assignment_id' => $assignment_id],
            ['submission_url' => $request->input('submission_url')]
        );

        if ( $assessment->gradable && $assessment->autograde && $assessment->due_date < Carbon::now()) {
            $file_name = "submissions/gradeable_{$user->id}_{$user->name}_{$submission->id}_{$assessment->id}.json";
            $file_content = json_encode(["submission" => $submission, "assessment" => $assessment]);
            GradeAssessment::dispatch($submission, $assessment);
            Storage::disk('s3')->put(
                $file_name, $file_content
            );
        }

        return $submission;

    }


}
