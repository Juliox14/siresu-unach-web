<?php

namespace App\Filament\Resources\Areas\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;


class AreaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Información del Área')
                    ->schema([
                        TextInput::make('nombre')
                            ->required()
                            ->maxLength(255),
                    ]),

                Section::make('Personal del Área')
                    ->description('El primer empleado de la lista se mostrará como el Encargado/Director.')
                    ->schema([
                        Repeater::make('personas')
                            ->relationship()
                            ->schema([
                                TextInput::make('nombre')->required()->columnSpan(2),
                                TextInput::make('cargo')->required()->columnSpan(2),
                                TextInput::make('correo')->email()->columnSpan(2),
                                TextInput::make('telefono')->columnSpan(2),
                                FileUpload::make('foto')
                                    ->image()
                                    ->directory('directorio')
                                    ->disk('public')
                                    ->columnSpanFull(),
                            ])
                            ->columns(4)
                            ->collapsible()
                            ->orderColumn('orden')
                            ->itemLabel(fn(array $state): ?string => $state['nombre'] ?? null),
                    ]),
            ]);
    }
}
