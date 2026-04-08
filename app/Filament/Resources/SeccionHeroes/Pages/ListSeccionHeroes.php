<?php

namespace App\Filament\Resources\SeccionHeroes\Pages;

use App\Filament\Resources\SeccionHeroes\SeccionHeroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSeccionHeroes extends ListRecords
{
    protected static string $resource = SeccionHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
