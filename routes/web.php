<?php

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/staff/', 'HomeController@index')->name('staffportal.home');
Route::get('/staff/assessments', 'HomeController@assessments')->name('staffportal.assessments');
Route::get('/staff/assessments/new', 'HomeController@create_assessment')->name('staffportal.assessments.new');
Route::get('/staff/students', 'HomeController@students')->name('staffportal.students');
Route::get('/staff/exams', 'HomeController@exams')->name('staffportal.exams');
Route::get('/staff/quizes', 'HomeController@quizes')->name('staffportal.quizes');
Route::get('/staff/labs', 'HomeController@labs')->name('staffportal.labs');

Route::get('auth/github', 'Auth\OAuthController@redirectToGithubProvider');
Route::get('auth/google', 'Auth\OAuthController@redirectToGoogleProvider');
Route::get('auth/google/callback', 'Auth\OAuthController@handleProviderGoogleCallback');
Route::get('auth/github/callback', 'Auth\OAuthController@handleProviderGithubCallback');

Route::namespace("Pages")->group(function () {
    Route::get('/student/profile', 'LearnerPages@profile')->name('studentportal.profile');
    Route::get('/student/exams', 'LearnerPages@exams')->name('studentportal.exams');
    Route::get('/student/quizes', 'LearnerPages@quizes')->name('studentportal.quizes');
    Route::get('/student/labs', 'LearnerPages@labs')->name('studentportal.labs');
    Route::get('/student/submission/{assignment_id}', 'LearnerPages@submission')->name('studentportal.submission_form');
});
