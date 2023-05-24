<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
       Gate::define('manage-properties', function(User $user) {
            return $user->is_owner == 1;
        });

        Gate::define('book-property', function(User $user) {
            return $user->is_user == 1;
        });
        Gate::define('manage-users', function(User $user) {
            return $user->is_admin == 1;
        });
    }
}
