<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Evento;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        // 1. Consulta base: Solo noticias donde 'activo' sea true, ordenadas por fecha
        $query = Noticia::where('activo', true)->orderBy('fecha_publicacion', 'desc');

        // 2. Filtro por Búsqueda de texto
        if ($request->filled('buscar')) {
            $busqueda = $request->buscar;
            $query->where(function ($q) use ($busqueda) {
                $q->where('titulo', 'like', "%{$busqueda}%")
                    ->orWhere('resumen', 'like', "%{$busqueda}%")
                    ->orWhere('contenido', 'like', "%{$busqueda}%"); // Buscamos también en el cuerpo de la noticia
            });
        }

        // 3. Filtro por Años (Filtrando sobre tu campo 'fecha_publicacion')
        if ($request->filled('anios')) {
            $query->whereYear('fecha_publicacion', $request->anios);
        }

        // Paginamos los resultados (ej: 6 noticias por página para que se vea balanceado)
        $noticias = $query->paginate(6);

        $queryEventos = Evento::with('archivos');
        
        $filtroEventos = $request->input('filtro_eventos', 'proximos');

        // Asumiendo que tu tabla de eventos tiene una columna 'fecha_evento'
        if ($filtroEventos === 'proximos') {
            $queryEventos->where('fecha_evento', '>=', now())->orderBy('fecha_evento', 'asc');
        } elseif ($filtroEventos === 'pasados') {
            $queryEventos->where('fecha_evento', '<', now())->orderBy('fecha_evento', 'desc');
        } else { // 'todos'
            $queryEventos->orderBy('fecha_evento', 'desc');
        }

        $eventos = $queryEventos->paginate(6, ['*'], 'page_eventos');

        // Pasamos ambas variables a la vista
        return view('noticias-eventos.index', compact('noticias', 'eventos'));
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
