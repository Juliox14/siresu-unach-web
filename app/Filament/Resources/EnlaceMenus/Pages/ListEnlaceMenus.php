<?php

namespace App\Filament\Resources\EnlaceMenus\Pages;

use App\Filament\Resources\EnlaceMenus\EnlaceMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnlaceMenus extends ListRecords
{
    protected static string $resource = EnlaceMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
