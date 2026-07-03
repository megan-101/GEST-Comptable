<?php

namespace App\Providers;

use App\Events\OperationComptableCreatedEvent;
use App\Events\OperationComptableUpdatedEvent;
use App\Events\OperationComptableDeletedEvent;
use App\Implementations\OperationComptableImpl;
use App\Interfaces\OperationComptableInterface;
use App\Listeners\CreateOperationComptable;
use App\Listeners\UpdateOperationComptable;
use App\Listeners\DeleteOperationComptable;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class OperationComptableProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(OperationComptableInterface::class, OperationComptableImpl::class);
    }

    public function boot(): void
    {
        Event::listen(OperationComptableCreatedEvent::class, CreateOperationComptable::class);
        Event::listen(OperationComptableUpdatedEvent::class, UpdateOperationComptable::class);
        Event::listen(OperationComptableDeletedEvent::class, DeleteOperationComptable::class);
    }
}
