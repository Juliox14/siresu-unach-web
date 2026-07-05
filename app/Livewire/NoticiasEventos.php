<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Departamento;
use App\Models\Convocatoria;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class NoticiasEventos extends Component
{
    use WithPagination;

    public $activeTab = 'noticias'; // Opcional: puedes cambiarlo a 'convocatorias' si quieres que sea la pestaña por defecto
    public $buscar = '';
    public $departamento_id = '';
    public $anios = [];
    public $filtroEventos = 'proximos';

    public function updating($property)
    {
        if (in_array($property, ['buscar', 'departamento_id', 'anios', 'filtroEventos', 'activeTab'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $departamentos = Departamento::orderBy('nombre')->get();

        // 1. FILTRAR NOTICIAS
        if ($this->departamento_id === 'general') {
            $allNews = \App\Services\UnachApiService::getNews(60);
            if ($this->buscar) {
                $allNews = collect($allNews)->filter(function($n) {
                    return stripos($n->titulo, $this->buscar) !== false || stripos($n->resumen, $this->buscar) !== false;
                })->all();
            }
            if (!empty($this->anios)) {
                $allNews = collect($allNews)->filter(function($n) {
                    return in_array(Carbon::parse($n->fecha_publicacion)->year, $this->anios);
                })->all();
            }
            $currentPage = LengthAwarePaginator::resolveCurrentPage('page_noticias');
            $perPage = 6;
            $currentItems = array_slice($allNews, ($currentPage - 1) * $perPage, $perPage);
            $noticias = new LengthAwarePaginator(
                $currentItems,
                count($allNews),
                $perPage,
                $currentPage,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => 'page_noticias',
                ]
            );
        } else {
            $noticiasQuery = Noticia::where('activo', true)
                ->where('estado_publicacion', 'publicado')
                ->orderBy('fecha_publicacion', 'desc');
            if ($this->buscar) {
                $noticiasQuery->where(function ($q) {
                    $q->where('titulo', 'like', "%{$this->buscar}%")
                        ->orWhere('resumen', 'like', "%{$this->buscar}%");
                });
            }
            if ($this->departamento_id) {
                $noticiasQuery->where('departamento_id', $this->departamento_id);
            }
            if (!empty($this->anios)) {
                $noticiasQuery->whereYear('fecha_publicacion', $this->anios);
            }
            $noticias = $noticiasQuery->paginate(6, ['*'], 'page_noticias');
        }


        // 2. FILTRAR EVENTOS
        if ($this->departamento_id === 'general') {
            $allEventsRaw = \App\Services\UnachApiService::getEvents(60);
            
            // Filter OUT convocatorias
            $allEvents = collect($allEventsRaw)->filter(function ($item) {
                return stripos($item->titulo, 'convocatoria') === false;
            });

            if ($this->filtroEventos === 'proximos') {
                $allEvents = $allEvents->filter(function ($e) {
                    $fecha = Carbon::parse($e->fecha_evento);
                    return $fecha->isAfter(now()) || $fecha->isSameDay(now());
                })->sortBy('fecha_evento')->all();
            } elseif ($this->filtroEventos === 'pasados') {
                $allEvents = $allEvents->filter(function ($e) {
                    return Carbon::parse($e->fecha_evento)->isBefore(now());
                })->sortByDesc('fecha_evento')->all();
            } else {
                $allEvents = $allEvents->sortByDesc('fecha_evento')->all();
            }
            
            $currentPage = LengthAwarePaginator::resolveCurrentPage('page_eventos');
            $perPage = 6;
            $currentItems = array_slice($allEvents, ($currentPage - 1) * $perPage, $perPage);
            $eventos = new LengthAwarePaginator(
                $currentItems,
                count($allEvents),
                $perPage,
                $currentPage,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => 'page_eventos',
                ]
            );
        } else {
            $eventosQuery = Evento::with('archivos')
                ->where('activo', true)
                ->where('estado_publicacion', 'publicado');
            if ($this->filtroEventos === 'proximos') {
                $eventosQuery->where('fecha_evento', '>=', now())->orderBy('fecha_evento', 'asc');
            } elseif ($this->filtroEventos === 'pasados') {
                $eventosQuery->where('fecha_evento', '<', now())->orderBy('fecha_evento', 'desc');
            } else {
                $eventosQuery->orderBy('fecha_evento', 'desc');
            }
            if ($this->departamento_id) {
                $eventosQuery->where('departamento_id', $this->departamento_id);
            }
            $eventos = $eventosQuery->paginate(6, ['*'], 'page_eventos');
        }


        // 3. FILTRAR CONVOCATORIAS (NUEVO)
        if ($this->departamento_id === 'general') {
            $apiEventsAll = \App\Services\UnachApiService::getEvents(60);
            $apiConvocatorias = collect($apiEventsAll)->filter(function ($item) {
                return stripos($item->titulo, 'convocatoria') !== false;
            })->map(function ($item) {
                $fecha = Carbon::parse($item->fecha_evento);
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
                    'fecha_limite' => $fecha, // for year filtering
                ];
            });

            if ($this->buscar) {
                $apiConvocatorias = $apiConvocatorias->filter(function($c) {
                    return stripos($c->titulo, $this->buscar) !== false || stripos($c->descripcion, $this->buscar) !== false;
                });
            }
            if (!empty($this->anios)) {
                $apiConvocatorias = $apiConvocatorias->filter(function($c) {
                    return in_array(Carbon::parse($c->fecha_limite)->year, $this->anios);
                });
            }

            $allConvocatorias = $apiConvocatorias->all();
            $currentPage = LengthAwarePaginator::resolveCurrentPage('page_convocatorias');
            $perPage = 6;
            $currentItems = array_slice($allConvocatorias, ($currentPage - 1) * $perPage, $perPage);
            $convocatorias = new LengthAwarePaginator(
                $currentItems,
                count($allConvocatorias),
                $perPage,
                $currentPage,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => 'page_convocatorias',
                ]
            );
        } else {
            $convocatoriasQuery = Convocatoria::where('activo', true)
                ->where('estado_publicacion', 'publicado')
                ->orderBy('created_at', 'desc');

            if ($this->buscar) {
                $convocatoriasQuery->where(function ($q) {
                    $q->where('titulo', 'like', "%{$this->buscar}%")
                        ->orWhere('descripcion', 'like', "%{$this->buscar}%");
                });
            }
            if ($this->departamento_id) {
                $convocatoriasQuery->where('departamento_id', $this->departamento_id);
            }
            if (!empty($this->anios)) {
                $convocatoriasQuery->whereYear('created_at', $this->anios);
            }
            $convocatorias = $convocatoriasQuery->paginate(6, ['*'], 'page_convocatorias');
        }


        return view('livewire.noticias-eventos', compact('noticias', 'eventos', 'departamentos', 'convocatorias'));
    }
}
