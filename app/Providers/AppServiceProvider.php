<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layouts.app', function($view){
            $view->with('currentLocale', App::currentLocale());
        });

        

        Paginator::useBootstrapFive(); 

    }
}
