<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Booking;
use App\Observers\BookingObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\ResourceRepositoryInterface::class,
            \App\Repositories\ResourceRepository::class
        );

        $this->app->bind(
            \App\Repositories\BookingRepositoryInterface::class,
            \App\Repositories\BookingRepository::class
        );
    }


    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Booking::observe(BookingObserver::class);
    }
}
