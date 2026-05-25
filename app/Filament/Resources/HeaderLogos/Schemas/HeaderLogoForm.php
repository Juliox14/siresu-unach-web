<?php

namespace App\Filament\Resources\HeaderLogos\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;

class HeaderLogoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre / Etiqueta')
                            ->required(),

                        Toggle::make('activo')
                            ->label('Visible en el header')
                            ->default(true),
                    ]),

                FileUpload::make('imagen')
                    ->label('Imagen del Logo')
                    ->image()
                    ->directory('header-logos')
                    ->disk('public')
                    ->imagePreviewHeight('100')
                    ->acceptedFileTypes(['image/png', 'image/svg+xml', 'image/webp'])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
