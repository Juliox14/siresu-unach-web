<?php

namespace App\Filament\Resources\Convocatorias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;

class ConvocatoriasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Portada')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('categoria')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('estado')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Abierta' => 'success',
                        'Próxima' => 'warning',
                        'Cerrada' => 'danger',
                        'Nueva'   => 'info',
                        default   => 'gray',
                    }),

                TextColumn::make('fecha_limite')
                    ->label('Vence')
                    ->date('d M, Y')
                    ->sortable(),

                ToggleColumn::make('activo')
                    ->label('Visible'),
            ])
            ->defaultSort('fecha_limite', 'desc')
            ->filters([
                SelectFilter::make('categoria'),
                SelectFilter::make('estado'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
