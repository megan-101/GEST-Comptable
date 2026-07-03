<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserInterface::class, UserImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
