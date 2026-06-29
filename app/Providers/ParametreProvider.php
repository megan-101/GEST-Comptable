<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Implementations\ParametreImpl;
use App\Interfaces\ParametreInterface;
class ParametreProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ParametreInterface::class, ParametreImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
