<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\PostComptableEvent;
use App\Listeners\createPostComptable;

use App\Implementations\PostComptableImplementation;
use App\Interfaces\PostComptableInterface;


class PostComptablePrivider extends ServiceProvider
{

protected $listen = [
    PostComptableEvent::class => [createdPostComptable::class]
];
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
