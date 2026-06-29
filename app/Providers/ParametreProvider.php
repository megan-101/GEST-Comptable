<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Implementations\ParametreImpl;
use App\Interfaces\ParametreInterface;
use App\Events\ParametreEvent;
use App\Listeners\CreateParametre;

class ParametreProvider extends ServiceProvider
{   
    protected $listen= [
        ParametreEvent::class => [CreateParametre::class]
    ];
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
