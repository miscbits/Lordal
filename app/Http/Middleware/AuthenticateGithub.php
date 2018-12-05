<?php

namespace App\Http\Middleware;

use Socialite;
use Closure;

class AuthenticateGithub
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (! $user = Socialite::driver('github')->userFromToken($request->input("token"))) {
            return redirect('/home');
        } elseif (! $student = Student::where('github_username', $user->username)->first()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
