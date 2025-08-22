<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserActivityLog;
use Jenssegers\Agent\Agent;

class TrackUserUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

        $browser = $agent->browser();                      
        $version = $agent->version($browser) ?? 'unknown';

        if (auth()->check()) {
            UserActivityLog::create([
                'user_id'     => auth()->id(),
                'url'         => $request->getPathInfo(),
                'method'      => $request->method(),
                'ip_address'  => $request->ip(),
                'user_agent'  => $browser . ' ' . $version,
                'accessed_at' => now(),
            ]);
        }

        return $next($request);
    }
}
