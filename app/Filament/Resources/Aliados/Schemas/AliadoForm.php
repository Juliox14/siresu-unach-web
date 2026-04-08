<?php

namespace App\Filament\Resources\Aliados\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class AliadoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('nombre')
                    ->label('Nombre de la Institución')
                    ->required()
                    ->maxLength(255),

                TextInput::make('url')
                    ->label('Sitio Web (Opcional)')
                    ->url()
                    ->prefix('https://'),

                FileUpload::make('imagen')
                    ->label('Logo (Preferiblemente PNG transparente)')
                    ->image()
                    ->directory('aliados') // Se guardarán en storage/app/public/aliados
                    ->disk('public')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('activo')
                    ->label('Visible en el carrusel')
                    ->default(true),
            ]);
    }
}
