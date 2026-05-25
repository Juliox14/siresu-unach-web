<?php

namespace App\Filament\Resources\HeaderLogos\Pages;

use App\Filament\Resources\HeaderLogos\HeaderLogoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHeaderLogo extends EditRecord
{
    protected static string $resource = HeaderLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
