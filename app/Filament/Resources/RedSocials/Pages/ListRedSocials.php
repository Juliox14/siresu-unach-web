<?php

namespace App\Filament\Resources\RedSocials\Pages;

use App\Filament\Resources\RedSocials\RedSocialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRedSocials extends ListRecords
{
    protected static string $resource = RedSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
