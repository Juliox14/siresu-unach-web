<?php

namespace App\Providers;

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
        view()->composer(['components.footer', 'components.header'], function ($view) {
            $view->with('redesSociales', \App\Models\RedSocial::whereNull('departamento_id')
                ->where('activo', true)
                ->get());
        });

        view()->composer('components.footer', function ($view) {
            $view->with('infoSiresu', \App\Models\AcercaDe::first());
        });
    }
}
