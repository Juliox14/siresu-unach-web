<?php

namespace App\Filament\Resources\HeaderLogos\Pages;

use App\Filament\Resources\HeaderLogos\HeaderLogoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeaderLogos extends ListRecords
{
    protected static string $resource = HeaderLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
