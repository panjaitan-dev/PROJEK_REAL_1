<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();

        // Share home settings globally with all views
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('home_settings')) {
                \Illuminate\Support\Facades\View::share('hs', \App\Models\HomeSetting::allAsArray());
            } else {
                \Illuminate\Support\Facades\View::share('hs', []);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\View::share('hs', []);
        }
    }
}
