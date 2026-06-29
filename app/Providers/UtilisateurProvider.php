<?php

namespace App\Providers;

use App\Events\UtilisateurEvent;
use App\Implementations\UtilisateurImpl;
use App\Interfaces\UtilisateurInterface;
use App\Listeners\CreateUtilisateurLister;
use Illuminate\Support\ServiceProvider;

class UtilisateurProvider extends ServiceProvider
{
    protected $listen = [
        UtilisateurEvent::class => [CreateUtilisateurLister::class],
    ];
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
