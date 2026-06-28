<?php

namespace App\Filament\Resources\Noticias\Pages;

use App\Filament\Resources\Noticias\NoticiaResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateNoticia extends CreateRecord
{
    protected static string $resource = NoticiaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (
            \App\Models\Configuracion::requiereAprobacionNoticias() && 
            Auth::user()?->rol !== 'super_admin'
        ) {
            $data['estado_publicacion'] = 'revision';
        } else {
            $data['estado_publicacion'] = 'publicado';
        }

        return $data;
    }
}
