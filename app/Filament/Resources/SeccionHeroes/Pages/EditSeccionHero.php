<?php

namespace App\Filament\Resources\SeccionHeroes\Pages;

use App\Filament\Resources\SeccionHeroes\SeccionHeroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSeccionHero extends EditRecord
{
    protected static string $resource = SeccionHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
