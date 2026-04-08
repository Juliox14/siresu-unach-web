<?php

namespace App\Filament\Resources\Convocatorias\Pages;

use App\Filament\Resources\Convocatorias\ConvocatoriaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditConvocatoria extends EditRecord
{
    protected static string $resource = ConvocatoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }
}
