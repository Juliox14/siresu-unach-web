<?php

namespace App\Http\Controllers;

use App\Models\EnlaceRapido;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Convocatoria;
use App\Models\Aliado;
use App\Models\Instalacion;

class InicioController extends Controller
{
    public function __invoke()
    {

        $enlaces = EnlaceRapido::where('activo', true)
            ->orderBy('orden', 'asc')
            ->get();


        $eventosApiAll = \App\Services\UnachApiService::getEvents(15);
        $eventosApiAllColl = collect($eventosApiAll);

        // Filter API events (do not contain 'convocatoria')
        $eventosApi = $eventosApiAllColl->filter(function ($item) {
            return stripos($item->titulo, 'convocatoria') === false;
        });

        // Filter API convocatorias (contain 'convocatoria')
        $convocatoriasApi = $eventosApiAllColl->filter(function ($item) {
            return stripos($item->titulo, 'convocatoria') !== false;
        })->map(function ($item) {
            $fecha = \Carbon\Carbon::parse($item->fecha_evento);
            return (object) [
                'id' => $item->id,
                'is_api' => true,
                'titulo' => $item->titulo,
                'slug' => $item->slug,
                'url' => $item->url,
                'descripcion' => $item->descripcion,
                'estado' => 'Abierta',
                'mes_limite' => strtoupper($fecha->translatedFormat('M')),
                'dia_limite' => $fecha->format('d'),
                'fecha_formateada' => $fecha->translatedFormat('d \d\e F, Y'),
                'categoria' => 'General',
                'imagen' => $item->imagen,
            ];
        });

        $noticiasLocales = Noticia::where('activo', true)
            ->where('estado_publicacion', 'publicado')
            ->orderBy('fecha_publicacion', 'desc')
            ->take(4)
            ->get();
        $noticiasApi = \App\Services\UnachApiService::getNews(4);
        $noticias = collect($noticiasLocales)->merge($noticiasApi)->take(4);

        $eventosLocales = Evento::where('activo', true)
            ->where('estado_publicacion', 'publicado')
            ->with('archivos')
            ->whereDate('fecha_evento', '>=', now())
            ->orderBy('fecha_evento', 'asc')
            ->take(8)
            ->get();
        $eventos = collect($eventosLocales)->merge($eventosApi)->take(8);

        $convocatoriasLocales = Convocatoria::where('activo', true)
            ->where('estado_publicacion', 'publicado')
            ->whereDate('fecha_limite', '>=', now())
            ->orderBy('fecha_limite', 'asc')
            ->take(6)
            ->get();
        $convocatorias = collect($convocatoriasLocales)->merge($convocatoriasApi)->take(6);

        $instalacionDestacada = Instalacion::where('es_destacado', true)->first();
        $aliados = Aliado::where('activo', true)->get();

        $instalacionDestacada = Instalacion::where('es_destacado', true)->first();

        $aliados = Aliado::where('activo', true)->get();

        return view('inicio', compact('enlaces', 'noticias', 'eventos', 'convocatorias', 'instalacionDestacada', 'aliados'));
    }
}
