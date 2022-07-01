<?php

namespace App\Providers;
use App\Repository\MRD\SelfAdvetRepository;
use App\Repository\MRD\EloquentSelfAdvetRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SelfAdvetRepository::class, EloquentSelfAdvetRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
