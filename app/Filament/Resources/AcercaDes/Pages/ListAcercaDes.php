<?php

namespace App\Filament\Resources\AcercaDes\Pages;

use App\Filament\Resources\AcercaDes\AcercaDeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcercaDes extends ListRecords
{
    protected static string $resource = AcercaDeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->hidden(fn () => static::getModel()::count() > 0),            
        ];
    }
}
