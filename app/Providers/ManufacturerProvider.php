<?php

namespace App\Providers;

use App\Events\ManufacturerEvent;
use App\Implementations\ManufacturerImpl;
use App\Interfaces\ManufacturerInterface;
use App\Listeners\CreateManufacturer;
use Illuminate\Support\ServiceProvider;

class ManufacturerProvider extends ServiceProvider
{
    protected $listen = [
        ManufacturerEvent::class => [CreateManufacturer::class]
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ManufacturerInterface::class, ManufacturerImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
