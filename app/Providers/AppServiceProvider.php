<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\Field;
use App\Models\Departamento;
use App\Observers\DepartamentoObserver;
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

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

        Field::configureUsing(function (Field $component) {
            if ($component->getName() === 'guard_name') {
                $component->hidden(); // Lo oculta visualmente del formulario
            }
        });

        View::composer('components.header', MenuComposer::class);

        View::composer('components.header', function ($view) {
            $view->with('headerLogos', Cache::remember('header_logos', now()->addHours(36), function () {
                return \App\Models\HeaderLogo::where('activo', true)
                    ->orderBy('orden')
                    ->get();
            }));
        });

        Departamento::observe(DepartamentoObserver::class);
    }
}
