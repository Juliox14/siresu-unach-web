<?php

use App\Http\Controllers\AcercaDeController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\ConvocatoriaController;

Route::get('/', InicioController::class)->name('inicio');
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

Route::get('/acerca-de', [AcercaDeController::class, 'show'])->name('acerca-de');

Route::get('/directorio', [DirectorioController::class, 'show'])->name('directorio');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');

Route::get('/instalaciones', [InstalacionController::class, 'index'])->name('instalaciones.index');

Route::get('/noticias/{slug}', [NoticiaController::class, 'show'])->name('noticias-eventos.show-noticia');

Route::get('/direcciones/{slug}', [DepartamentoController::class, 'show'])->name('direcciones.show');

Route::get('/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'show'])->name('convocatorias.show');

Route::view('/terminos-y-condiciones', 'legal.terminos')->name('legal.terminos');
Route::view('/transparencia', 'legal.transparencia')->name('legal.transparencia');
Route::view('/aviso-de-privacidad', 'legal.privacidad')->name('legal.privacidad');

Route::get('/debug-php', function() {
    phpinfo();
});

Route::middleware([\Filament\Http\Middleware\Authenticate::class])
    ->prefix('admin/preview')
    ->name('admin.preview.')
    ->group(function () {
        Route::get('/noticia/{record}', [\App\Http\Controllers\Admin\PreviewController::class, 'noticia'])->name('noticia');
        Route::get('/evento/{record}', [\App\Http\Controllers\Admin\PreviewController::class, 'evento'])->name('evento');
        Route::get('/convocatoria/{record}', [\App\Http\Controllers\Admin\PreviewController::class, 'convocatoria'])->name('convocatoria');
    });