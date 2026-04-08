<?php

namespace App\Filament\Resources\Convocatorias\Pages;

use App\Filament\Resources\Convocatorias\ConvocatoriaResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateConvocatoria extends CreateRecord
{
    protected static string $resource = ConvocatoriaResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }
}
