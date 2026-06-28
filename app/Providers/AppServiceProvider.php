<?php

namespace App\Providers;

use App\Repositories\Contracts\GuestRepositoryInterface;
use App\Repositories\Contracts\RsvpRepositoryInterface;
use App\Repositories\Contracts\WishRepositoryInterface;
use App\Repositories\GuestRepository;
use App\Repositories\RsvpRepository;
use App\Repositories\WishRepository;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register repository bindings.
     */
    public function register(): void
    {
        $this->app->bind(GuestRepositoryInterface::class, GuestRepository::class);
        $this->app->bind(RsvpRepositoryInterface::class,  RsvpRepository::class);
        $this->app->bind(WishRepositoryInterface::class,  WishRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
