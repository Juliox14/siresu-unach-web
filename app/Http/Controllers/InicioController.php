<?php

namespace App\Http\Controllers;

use App\Models\SeccionHero;
use App\Models\EnlaceRapido;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Convocatoria;
use App\Models\Aliado;
use App\Models\Instalacion;
use Carbon\Carbon;

class InicioController extends Controller
{
    public function __invoke()
    {
        $heroes = SeccionHero::latest()->get();

        $enlaces = EnlaceRapido::where('activo', true)
            ->orderBy('orden', 'asc')
            ->get();


        $noticias = Noticia::where('activo', true)
            ->orderBy('fecha_publicacion', 'desc')
            ->take(3)
            ->get();

        $eventos = Evento::where('activo', true)->with('archivos')
            ->whereDate('fecha_evento', '>=', now())
            ->orderBy('fecha_evento', 'asc')
            ->take(8)
            ->get();



        $convocatorias = Convocatoria::where('activo', true)
            ->whereDate('fecha_limite', '>=', now())
            ->orderBy('fecha_limite', 'asc')
            ->take(6)
            ->get();

        $instalacionDestacada = Instalacion::where('es_destacado', true)->first();
        $aliados = Aliado::where('activo', true)->get();

        $instalacionDestacada = Instalacion::where('es_destacado', true)->first();

        $aliados = Aliado::where('activo', true)->get();

        return view('inicio', compact('heroes', 'enlaces', 'noticias', 'eventos', 'convocatorias', 'instalacionDestacada', 'aliados'));
    }
}
