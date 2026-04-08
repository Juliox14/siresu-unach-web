<?php

namespace App\Filament\Resources\Eventos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;


class EventosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->circular()
                    ->disk('public'),
                TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('fecha_evento')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('categoria')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Talleres' => 'warning',
                        'Cultural' => 'purple',
                        'Social' => 'success',
                        'Deportes' => 'info',
                        default => 'gray',
                    }),
                ToggleColumn::make('activo'),
            ])
            ->defaultSort('fecha_evento', 'asc'); // Los más próximos primero
    }
}
