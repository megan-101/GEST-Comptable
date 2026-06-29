<?php

namespace App\Providers;

use App\Implementations\UtilisateurImpl;
use App\Interfaces\UtilisateurInterface;
use Illuminate\Support\ServiceProvider;

class UtilisateurProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UtilisateurInterface::class, UtilisateurImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
