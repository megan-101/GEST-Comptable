<?php

namespace App\Providers;

use App\Implementations\CompteImpl;
use App\Interfaces\CompteInterface;
use Illuminate\Support\ServiceProvider;

class CompteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CompteInterface::class, CompteImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
