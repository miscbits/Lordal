<?php

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('staff', 'HomeController@index')->name('home');
Route::get('staff/{any}', 'HomeController@index')->where('any', '.*');

Route::get('auth/github', 'Auth\OauthController@redirectToGithubProvider');
Route::get('auth/google', 'Auth\OauthController@redirectToGoogleProvider');
Route::get('auth/google/callback', 'Auth\OauthController@handleProviderGoogleCallback');
Route::get('auth/github/callback', 'Auth\OauthController@handleProviderGithubCallback');

Route::middleware(['auth.student'])->namespace("Pages")->group(function () {
    Route::get('profile', 'LearnerPages@Profile');
});
