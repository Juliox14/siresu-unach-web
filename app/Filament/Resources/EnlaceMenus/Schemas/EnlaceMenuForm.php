<?php

namespace App\Filament\Resources\EnlaceMenus\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Select;

class EnlaceMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        // FILA 1: Título y URL
                        Grid::make(2)
                            ->schema([
                                TextInput::make('titulo')
                                    ->label('Texto del Enlace')
                                    ->required(),

                                TextInput::make('url')
                                    ->label('Enlace (URL)')
                                    ->placeholder('ej: /noticias o /servicios#becas')
                                    ->helperText('Puedes poner un enlace aunque sea desplegable.')
                                    ->required(fn(Get $get) => ! $get('es_menu_desplegable')),
                            ]),

                        // FILA 2: Toggles
                        Grid::make(2)
                            ->schema([
                                Toggle::make('nueva_pestana')
                                    ->label('Abrir en nueva pestaña')
                                    ->default(false),

                                Toggle::make('es_menu_desplegable')
                                    ->label('¿Es un menú desplegable?')
                                    ->helperText('Activa esto si quieres que al pasar el cursor se muestren sub-enlaces.')
                                    ->live(),

                                Select::make('fila')
                                    ->label('Fila de ubicación')
                                    ->options([
                                        1 => 'Fila 1 (Superior, junto al buscador)',
                                        2 => 'Fila 2 (Principal)',
                                    ])
                                    ->default(2)
                                    ->required(),
                            ]),



                        // FILA 3: Repeater de hijos (solo visible si es desplegable)
                        Repeater::make('hijos')
                            ->label('Sub-enlaces del menú')
                            ->relationship('hijos')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('titulo')
                                            ->label('Texto')
                                            ->required(),

                                        TextInput::make('url')
                                            ->label('URL')
                                            ->placeholder('ej: /becas')
                                            ->required(),
                                    ]),

                                Toggle::make('nueva_pestana')
                                    ->label('Abrir en nueva pestaña')
                                    ->default(false),
                            ])
                            ->orderColumn('orden')
                            ->reorderable()
                            ->addActionLabel('+ Agregar sub-enlace')
                            ->hidden(fn(Get $get) => ! $get('es_menu_desplegable'))
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
