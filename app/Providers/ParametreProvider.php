<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Implementations\ParametreImpl;
use App\Interfaces\ParametreInterface;
use App\Events\ParametreEvent;
use App\Listeners\CreateParametre;

use App\Events\ParametreActivityEvent;
use App\Listeners\LogParametreActivity;
use Illuminate\Support\Facades\Event;

class ParametreProvider extends ServiceProvider
{   
    // protected $listen = [
    //     ParametreEvent::class => [CreateParametre::class],
    //     ParametreActivityEvent::class => [LogParametreActivity::class],
    // ];
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
