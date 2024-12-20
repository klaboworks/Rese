<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->role_name == 'administrator' || $role->role_name == 'manager') {
                    return true;
                }
            }
            return false;
        });

        Gate::define('super-admin',function($user){
            foreach ($user->roles as $role) {
                if ($role->role_name == 'administrator') {
                    return true;
                }
            }
            return false;
        });
    }
}
