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
            


        $convocatoriasBD = Convocatoria::where('activo', true)
            ->whereDate('fecha_limite', '>=', now()) 
            ->orderBy('fecha_limite', 'asc')
            ->take(6)
            ->get();

        $convocatorias = $convocatoriasBD->map(function ($item) {
            $fecha = Carbon::parse($item->fecha_limite);
            
            return [
                'titulo' => $item->titulo,
                'categoria' => $item->categoria,
                'estado' => $item->estado,
                'mes_limite' => strtoupper($fecha->translatedFormat('M')),
                'dia_limite' => $fecha->format('d'),
                'fecha_completa' => $fecha->translatedFormat('d \d\e F, Y'), 
                'imagen' => asset('storage/' . $item->imagen),
                'slug' => $item->slug,
            ];
        });

        $instalacionDestacada = Instalacion::where('es_destacado', true)->first();

        $aliados = Aliado::where('activo', true)->get();

        return view('inicio', compact('heroes', 'enlaces', 'noticias', 'eventos', 'convocatorias', 'instalacionDestacada', 'aliados'));
    }
}
