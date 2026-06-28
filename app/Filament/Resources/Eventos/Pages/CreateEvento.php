<?php

namespace App\Filament\Resources\Eventos\Pages;

use App\Filament\Resources\Eventos\EventoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\Auth;

class CreateEvento extends CreateRecord
{
    protected static string $resource = EventoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (
            \App\Models\Configuracion::requiereAprobacionEventos() && 
            Auth::user()?->rol !== 'super_admin'
        ) {
            $data['estado_publicacion'] = 'revision';
        } else {
            $data['estado_publicacion'] = 'publicado';
        }

        return $data;
    }

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }
}
