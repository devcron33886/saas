<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUserIsSubscribed
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() && ! auth()->user()->subscribed('default')) {
            // This user is not a paying customer...
            return to_route('account.billing');
        }

        return $next($request);
    }
}
