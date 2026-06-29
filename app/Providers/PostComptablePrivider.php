<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Implementations\PostComptableImplementation;
use App\Interfaces\PostComptableInterface;


class PostComptablePrivider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(PostComptableInterface::class, PostComptableImplementation::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
