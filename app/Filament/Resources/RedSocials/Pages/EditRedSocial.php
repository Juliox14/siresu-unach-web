<?php

namespace App\Filament\Resources\RedSocials\Pages;

use App\Filament\Resources\RedSocials\RedSocialResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRedSocial extends EditRecord
{
    protected static string $resource = RedSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
