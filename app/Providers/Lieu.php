<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\interfaces\LieuInterface;
use App\implementations\LieuImp;

class Lieu extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LieuInterface::class, LieuImp::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
