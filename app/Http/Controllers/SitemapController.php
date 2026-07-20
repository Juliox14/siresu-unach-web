<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Convocatoria;
use App\Models\Departamento;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $content = cache()->remember('sitemap.xml', 3600, function () {
            $noticias = Noticia::where('activo', true)
                ->where('estado_publicacion', 'publicado')
                ->orderBy('updated_at', 'desc')
                ->get(['slug', 'updated_at']);

            $convocatorias = Convocatoria::where('activo', true)
                ->where('estado_publicacion', 'publicado')
                ->orderBy('updated_at', 'desc')
                ->get(['slug', 'updated_at']);

            $departamentos = Departamento::orderBy('updated_at', 'desc')
                ->get(['slug', 'updated_at']);

            return view('sitemap', compact('noticias', 'convocatorias', 'departamentos'))->render();
        });

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
