<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class VerifyWebhook
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
        $webhook_secret = Config::get('services.github.webhook_secret');

        $content = $request->getContent();
        $checksum = $request->header('x-hub-signature');
        $digest = 'sha1=' . hash_hmac('sha1', $content, $webhook_secret);
        $secret_from_hook = $request->json('secret');

        if ( (!$checksum && !$secret_from_hook) || !$digest || ($checksum !== $digest && $webhook_secret !== $secret_from_hook) ) {
            return response('Request body digest did not match X-Hub_Signature', 401);
        }

        return $next($request);
    }
}