<?php

namespace App\Providers;

use App\Events\LogEvent;
use App\Implementations\LogImpl;
use App\Interfaces\LogInterface;
use App\Listeners\LogEventListener;
use Illuminate\Support\ServiceProvider;

class LogProvider extends ServiceProvider
{
    protected $listen = [
        LogEvent::class => [LogEventListener::class]
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LogInterface::class, LogImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
