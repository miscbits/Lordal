<?php

Route::get('/', function () {
    return "api is up";
});

Route::post('login/github/callback', 'Auth\LoginController@handleStudentProviderCallback');
Route::post('login/google/callback', 'Auth\LoginController@handleStaffProviderCallback');

Route::middleware(['auth:api', 'auth.staff'])->group(function () {
    Route::apiResource('assessments', 'AssessmentsController');
    Route::apiResource('labs', 'LabsController')->only(['index', 'store']);
    Route::apiResource('quizes', 'QuizesController')->only(['index', 'store']);
    Route::apiResource('exams', 'ExamsController')->only(['index', 'store']);
    Route::apiResource('comments', 'CommentsController');
    Route::apiResource('submissions', 'SubmissionsController');
    Route::apiResource('assignments', 'AssignmentsController');
    Route::apiResource('students', 'StudentsController');

    Route::apiResource('assessments/{assessment_id}/students', 'AssessmentStudentsController');
    Route::apiResource('students/{student_id}/assessments', 'StudentAssessmentsController');
    Route::apiResource('students/{student_id}/comments', 'StudentCommentsController');
});

Route::middleware(['auth:api', 'auth.student'])->namespace("LearnerApi")->prefix("learner")->group(function () {
    Route::get('assessments', 'AssessmentsController');
    Route::get('profile', 'StudentsController');
});

Route::middleware(['github_webhook'])->namespace("Webhooks")->prefix('github')->group(function () {
//    Route::get('assessment_submission', 'AssessmentSubmissionController');
//    Route::get('lab_submission', 'AssessmentSubmissionController');
});

Route::get('/401', function(){
    return response()->json(['message' => 'Unauthorized.'], 401);
})->name('api.error.401');

Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');

