<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/staff';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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