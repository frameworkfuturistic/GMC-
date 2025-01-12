<?php

namespace App\Providers;

use App\Repository\MRD\EloquentSelfAdvetRepository;
use App\Repository\MRD\SelfAdvetRepository;
use App\Repository\NoticesTcs\iNoticeTcRepo;
use App\Repository\NoticesTcs\NoticeTcRepo;
use App\Repository\Survey\iSwmRepo;
use App\Repository\Survey\SwmRepo;
use Illuminate\Support\ServiceProvider;
// use Opcodes\LogViewer\Facades\LogViewer;
// use Opcodes\LogViewer\LogFile;
// use Illuminate\Support\Facades\Gate;
// use App\Models\User;

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
        $this->app->bind(iSwmRepo::class, SwmRepo::class);
        $this->app->bind(iNoticeTcRepo::class, NoticeTcRepo::class);
        $this->app->register(\KitLoong\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // LogViewer::auth(function ($request) {
        //     // return true to allow viewing the Log Viewer.
        // });

        // // Here's an example:
        // LogViewer::auth(function ($request) {
        //     return $request->user()
        //         && in_array($request->user()->email, [
        //             'admin@gmail.com'
        //         ]);
        // });

        // $this->registerPolicies();

        // Gate::define('downloadLogFile', function (?User $user, LogFile $file) {
        //     return true;
        // });

        // Gate::define('deleteLogFile', function (?User $user, LogFile $file) {
        //     return true;
        // });

    }
}
