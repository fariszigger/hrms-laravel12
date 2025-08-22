<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TrackUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (is_null($user->deleted_at)) {
                $user->update(['last_seen_at' => now()]);
            }
        }

        return $next($request);
    }
}

