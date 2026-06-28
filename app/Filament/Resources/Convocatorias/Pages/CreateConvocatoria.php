<?php

namespace App\Filament\Resources\Convocatorias\Pages;

use App\Filament\Resources\Convocatorias\ConvocatoriaResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\Auth;

class CreateConvocatoria extends CreateRecord
{
    protected static string $resource = ConvocatoriaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (
            \App\Models\Configuracion::requiereAprobacionConvocatorias() && 
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
