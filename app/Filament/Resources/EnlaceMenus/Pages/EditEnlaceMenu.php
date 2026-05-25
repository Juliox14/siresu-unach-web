<?php

namespace App\Filament\Resources\EnlaceMenus\Pages;

use App\Filament\Resources\EnlaceMenus\EnlaceMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEnlaceMenu extends EditRecord
{
    protected static string $resource = EnlaceMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
