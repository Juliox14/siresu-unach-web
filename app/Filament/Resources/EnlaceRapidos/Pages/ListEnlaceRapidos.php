<?php

namespace App\Filament\Resources\EnlaceRapidos\Pages;

use App\Filament\Resources\EnlaceRapidos\EnlaceRapidoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnlaceRapidos extends ListRecords
{
    protected static string $resource = EnlaceRapidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
