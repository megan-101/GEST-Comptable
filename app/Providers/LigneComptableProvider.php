<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Implementations\LigneComptableImpl;
use App\Interfaces\LigneComptableInterface;

class LigneComptableProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LigneComptableInterface::class, LigneComptableImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
