<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('role', function (...$roles) {
            $user = Auth::user();
            return $user && in_array($user->role->slug, $roles);
        });

        Blade::if('unlessrole', function (...$roles) {
            $user = Auth::user();
            return !$user || !in_array($user->role->slug, $roles);
        });

        DB::statement("SET time_zone = '+07:00'");
    }
}
