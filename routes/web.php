<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateUser;
use App\Http\Middleware\TrackUserActivity;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

use App\Models\User;

// Handle guest auth
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/', function () {
        return redirect('/dashboard');
    })->middleware(AuthenticateUser::class);
});

// Handle logout cant be accessed when login or redirected to login if not logged in
Route::get('/logout', fn () => redirect()->route(auth()->check() ? 'dashboard' : 'login'));

// Handle logout submission without controller
Route::post('/logout', function () {
    Auth::logout(); // Log out the user
    request()->session()->invalidate(); // Invalidate the session
    request()->session()->regenerateToken(); // Regenerate CSRF token

    return redirect()->route('login'); // Redirect to login page
})->middleware('auth')->name('logout');

// Group routes under /dashboard prefix and auth middleware
Route::middleware(['auth', 'track.activity', 'track.user.url'])->group(function () {

    // Dashboard Routes
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    // Employee Routes
    Route::prefix('employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::get('/training', [EmployeeController::class, 'training'])->name('employee.training');
    });

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
    });

    // User and Admin Routes
   Route::prefix('settings')->middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/roles', [UserController::class, 'roles'])->name('roles.index');
        Route::get('/export-users-txt', function () {
            $filename = 'users_export_' . now()->format('Ymd_His') . '.txt';

            $content = "ID\tName\tEmail\n";

            $users = User::all();
            foreach ($users as $user) {
                $content .= "{$user->id};{$user->name};{$user->username}\n";
            }

            return response($content)
                ->header('Content-Type', 'text/plain')
                ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
        })->name('export.users.txt');
        });
        
});



