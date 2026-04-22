<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Departamento;
use App\Models\Convocatoria; // <-- Asegúrate de importar el modelo

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
        $noticiasQuery = Noticia::where('activo', true)->orderBy('fecha_publicacion', 'desc');
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


        // 2. FILTRAR EVENTOS
        $eventosQuery = Evento::with('archivos');
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


        // 3. FILTRAR CONVOCATORIAS (NUEVO)
        // Asumiendo que tu tabla de convocatorias tiene fecha_publicacion o created_at
        $convocatoriasQuery = Convocatoria::where('activo', true)->orderBy('created_at', 'desc');

        if ($this->buscar) {
            $convocatoriasQuery->where(function ($q) {
                $q->where('titulo', 'like', "%{$this->buscar}%")
                    ->orWhere('descripcion', 'like', "%{$this->buscar}%"); // Ajusta el nombre de la columna si es diferente
            });
        }
        if ($this->departamento_id) {
            $convocatoriasQuery->where('departamento_id', $this->departamento_id);
        }
        if (!empty($this->anios)) {
            $convocatoriasQuery->whereYear('created_at', $this->anios); // Ajusta a la fecha correcta
        }
        $convocatorias = $convocatoriasQuery->paginate(6, ['*'], 'page_convocatorias');


        return view('livewire.noticias-eventos', compact('noticias', 'eventos', 'departamentos', 'convocatorias'));
    }
}
