<?php

namespace App\Providers;

use App\Events\PostComptableEvent;
use App\Implementations\PostComptableImpl;
use App\Interfaces\PostComptableInterface;
use App\Listeners\CreatePostComptable;
use Illuminate\Support\ServiceProvider;

class PostComptableProvider extends ServiceProvider
{
    protected $listen = [
        PostComptableEvent::class => [CreatePostComptable::class],
    ];

    public function register(): void
    {
        $this->app->bind(PostComptableInterface::class, PostComptableImpl::class);
    }

    public function boot(): void
    {
        //
    }
}
