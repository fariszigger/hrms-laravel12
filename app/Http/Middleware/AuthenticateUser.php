<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        // Get username and password from the request
        $credentials = $request->only('username', 'password');

        // Check if the 'remember' checkbox is selected
        $remember = $request->has('remember');

        // Find the user by username
        $user = User::where('username', $credentials['username'])->first();

        // Check if user exists and the password matches
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            // If the credentials are wrong, redirect back with an error message
            return redirect()->back()->with('loginError', 'Username atau password salah');
        }

        // Log in the user (with remember me functionality if checked)
        Auth::login($user, $remember);

        // Regenerate the session to prevent session fixation
        $request->session()->regenerate();

        // Proceed with the next request
        return $next($request);
    }
}
