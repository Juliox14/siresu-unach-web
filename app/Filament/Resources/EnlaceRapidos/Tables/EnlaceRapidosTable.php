<?php

namespace App\Filament\Resources\EnlaceRapidos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class EnlaceRapidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orden')->sortable(),
                
                TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('icono')
                    ->icon(fn (string $state): string => $state) // Intenta previsualizar el icono
                    ->label('Icono'),

                ToggleColumn::make('activo')
                    ->label('Visible'),
            ])
            ->defaultSort('orden', 'asc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}