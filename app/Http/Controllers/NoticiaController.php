<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index()
    {
        return view('noticias-eventos.index');
    }

    public function show($slug)
    {
        // Buscamos la noticia principal asegurándonos de que esté activa
        $noticia = Noticia::where('slug', $slug)
            ->where('activo', true)
            ->firstOrFail();

        // Buscamos 3 noticias recientes diferentes a la que estamos viendo
        $otrasNoticias = Noticia::where('activo', true)
            ->where('id', '!=', $noticia->id)
            ->latest('fecha_publicacion')
            ->take(3)
            ->get();

        return view('noticias-eventos.show-noticia', compact('noticia', 'otrasNoticias'));
    }
}
