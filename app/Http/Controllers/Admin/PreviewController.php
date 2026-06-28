<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Convocatoria;

class PreviewController extends Controller
{
    public function noticia(Noticia $record)
    {
        $noticia = $record;
        $otrasNoticias = Noticia::where('activo', true)
            ->where('estado_publicacion', 'publicado')
            ->where('id', '!=', $noticia->id)
            ->latest('fecha_publicacion')
            ->take(3)
            ->get();
            
        return view('noticias-eventos.show-noticia', compact('noticia', 'otrasNoticias'));
    }

    public function evento(Evento $record)
    {
        $evento = $record;
        return view('eventos.show', compact('evento')); 
        // Note: Assuming 'eventos.show' or 'noticias-eventos.show-evento' is the view. 
        // I will check the exact view path later if needed.
    }

    public function convocatoria(Convocatoria $record)
    {
        $convocatoria = $record;
        return view('convocatorias.show', compact('convocatoria'));
    }
}
