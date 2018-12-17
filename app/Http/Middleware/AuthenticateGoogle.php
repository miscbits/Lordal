<?php

namespace App\Http\Middleware;

use Socialite;
use Closure;

class AuthenticateGoogle
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
        if (! $user = Socialite::driver('google')->userFromToken($request->input("token"))) {
            return redirect('/home');
        } elseif ($user->hd != "zipcodewilmington.com") {
            return redirect('/home');
        }

        $request->user = $user;

        return $next($request);
    }
}
