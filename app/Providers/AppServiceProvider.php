<?php

namespace App\Providers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //to share data from blade views
        View::share('title', 'Dashboard');

        //attached the data from database
        // View::composer('students.index', function ($view) {
        //     $view->with('students', Students::all());
        // });
    }
}
