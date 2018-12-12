<?php

Route::get('/', function () {
    return "api is up";
});

Route::post('login/github/callback', 'Auth\LoginController@handleStudentProviderCallback');
Route::post('login/google/callback', 'Auth\LoginController@handleStaffProviderCallback');

Route::middleware(['auth.staff'])->group(function () {
    Route::apiResource('assessments', 'AssessmentsController');
    Route::apiResource('comments', 'CommentsController');
    Route::apiResource('submissions', 'SubmissionsController');
    Route::apiResource('assignments', 'AssignmentsController');
    Route::apiResource('students', 'StudentsController');
});


Route::middleware(['auth.student'])->namespace("LearnerApi")->prefix("learner")->group(function () {

});

Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');

