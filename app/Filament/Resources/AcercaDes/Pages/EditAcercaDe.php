<?php

namespace App\Filament\Resources\AcercaDes\Pages;

use App\Filament\Resources\AcercaDes\AcercaDeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcercaDe extends EditRecord
{
    protected static string $resource = AcercaDeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
