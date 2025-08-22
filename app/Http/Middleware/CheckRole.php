<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     * @param  Request  $request
     * @param  Closure  $next
     * @param  mixed ...$roles Role names allowed to access the route
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Assuming user has a relationship 'role' returning Role model with 'name' attribute
        if (!in_array($user->role->slug, $roles)) {
            return redirect()->route('dashboard')
                ->with('show-toast', [
                    'type' => 'danger',
                    'message' => 'You Have No Authorization to Access this Page!',
                ]);
        }

        return $next($request);
    }
}
