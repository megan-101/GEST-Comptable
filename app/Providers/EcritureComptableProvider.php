<?php

namespace App\Providers;

use App\Implementations\EcritureComptableImpl;
use App\Interfaces\EcritureComptableInterface;
use Illuminate\Support\ServiceProvider;

class EcritureComptableProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EcritureComptableInterface::class, EcritureComptableImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
