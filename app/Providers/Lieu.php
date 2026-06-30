<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\interfaces\LieuInterface;
use App\implementations\LieuImp;

use App\Events\LieuEvent;
use App\Events\LieuUpdatedEvent;
use App\Events\LieuDeletedEvent;

use App\Listeners\CreateLieu;
use App\Listeners\UpdateLieu;
use App\Listeners\DeleteLieu;

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
        // Wiring des événements Lieu → Listeners (log en DB + fichier)
        // Les événements sont auto-découverts en Laravel 11.
        // Event::listen(LieuEvent::class,        CreateLieu::class);
        // Event::listen(LieuUpdatedEvent::class, UpdateLieu::class);
        // Event::listen(LieuDeletedEvent::class, DeleteLieu::class);
    }
}
