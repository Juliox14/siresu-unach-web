<?php

namespace App\Filament\Resources\EnlaceRapidos\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EnlaceRapidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detalles del Enlace')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('titulo')
                                ->required()
                                ->label('Texto del Botón'),

                            TextInput::make('orden')
                                ->numeric()
                                ->default(0)
                                ->label('Orden de aparición'),
                        ]),

                        TextInput::make('enlace_url')
                            ->url()
                            ->required()
                            ->label('URL de destino (Ej: https://unach.mx)'),

                        TextInput::make('icono')
                            ->required()
                            ->label('Código del Icono')
                            ->placeholder('heroicon-o-academic-cap')
                            ->helperText('Busca el nombre en heroicons.com y antepon "heroicon-o-"'),

                        Toggle::make('activo')
                            ->default(true)
                            ->label('Visible en la web'),
                    ])
            ]);
    }
}