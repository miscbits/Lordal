<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class LoginController extends Controller
{
    /**
     * Obtain the user information from GitHub.
     */
    public function handleStudentProviderCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();

        // $user->token;
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleStaffProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // $user->token;
    }

}
