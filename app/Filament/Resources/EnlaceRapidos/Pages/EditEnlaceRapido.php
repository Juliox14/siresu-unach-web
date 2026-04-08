<?php

namespace App\Filament\Resources\EnlaceRapidos\Pages;

use App\Filament\Resources\EnlaceRapidos\EnlaceRapidoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEnlaceRapido extends EditRecord
{
    protected static string $resource = EnlaceRapidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
