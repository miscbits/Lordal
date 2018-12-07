<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return "api is up";
});

Route::post('login/github/callback', 'Auth\LoginController@handleStudentProviderCallback');
Route::post('login/google/callback', 'Auth\LoginController@handleStaffProviderCallback');

Route::apiResource('assessments', 'AssessmentsController');
Route::apiResource('comments', 'CommentsController');
Route::apiResource('submissions', 'SubmissionsController');
Route::apiResource('assignments', 'AssignmentsController');
Route::apiResource('students', 'StudentsController');