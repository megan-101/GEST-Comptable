<?php

namespace App\Providers;

use App\Events\UtilisateurEvent;
use App\Implementations\UtilisateurImpl;
use App\Interfaces\UtilisateurInterface;
// use App\Listeners\LogActionUserListener;
use Illuminate\Support\ServiceProvider;

class UtilisateurProvider extends ServiceProvider
{
    // protected $listen = [
    //     UtilisateurEvent::class => [LogActionUserListener::class],
    // ];

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
