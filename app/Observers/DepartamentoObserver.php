<?php

namespace App\Observers;

use App\Models\Departamento;
use App\Models\EnlaceMenu;

class DepartamentoObserver
{
    public function created(Departamento $departamento): void
    {
        // Buscar el enlace padre llamado "Direcciones"
        $padre = EnlaceMenu::where('titulo', 'Direcciones')
            ->whereNull('padre_id')
            ->first();

        if (! $padre) return;

        // Calcular el siguiente orden
        $ultimoOrden = EnlaceMenu::where('padre_id', $padre->id)
            ->max('orden') ?? 0;

        EnlaceMenu::create([
            'titulo'              => $departamento->nombre,
            'url'                 => '/direcciones/' . str($departamento->nombre)->slug(),
            'es_menu_desplegable' => false,
            'padre_id'            => $padre->id,
            'orden'               => $ultimoOrden + 1,
            'nueva_pestana'       => false,
        ]);
    }

    public function updated(Departamento $departamento): void
    {
        // Si cambia el nombre, actualizar el enlace correspondiente
        $padre = EnlaceMenu::where('titulo', 'Direcciones')
            ->whereNull('padre_id')
            ->first();

        if (! $padre) return;

        EnlaceMenu::where('padre_id', $padre->id)
            ->where('url', '/direcciones/' . str($departamento->getOriginal('nombre'))->slug())
            ->update([
                'titulo' => $departamento->nombre,
                'url'    => '/direcciones/' . str($departamento->nombre)->slug(),
            ]);
    }

    public function deleted(Departamento $departamento): void
    {
        // Eliminar el sub-enlace al borrar el departamento
        $padre = EnlaceMenu::where('titulo', 'Direcciones')
            ->whereNull('padre_id')
            ->first();

        if (! $padre) return;

        EnlaceMenu::where('padre_id', $padre->id)
            ->where('titulo', $departamento->nombre)
            ->delete();
    }
}