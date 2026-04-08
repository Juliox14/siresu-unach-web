<?php

namespace App\Filament\Resources\Areas\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AreasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->searchable(),
                // Podemos contar cuántas personas hay en esa área
                TextColumn::make('personas_count')
                    ->counts('personas')
                    ->label('Cant. Empleados'),
            ])
            ->reorderable('orden')
            ->defaultSort('orden');
    }
}
