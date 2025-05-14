<?php

namespace App\Providers;

use App\Models\Categorie;
use Illuminate\Support\Facades\Schema;
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
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Partage $categories avec toutes les vues qui utilisent 'layout.main'
        view()->composer('layout.main', function ($view) {
            $view->with('categories', Categorie::all());
        });
    }
}
