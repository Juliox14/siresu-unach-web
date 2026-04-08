<?php

namespace App\Filament\Resources\Instalacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;

class InstalacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen_portada')
                    ->label('Portada')
                    ->circular(),

                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('subtitulo')
                    ->searchable()
                    ->color('gray'),

                IconColumn::make('es_destacado')
                    ->label('Destacada (Hero)')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->alignCenter(),

                IconColumn::make('disponible_renta')
                    ->label('En Renta')
                    ->boolean()
                    ->alignCenter(),
            ])
            ->filters([
                TernaryFilter::make('es_destacado')
                    ->label('¿Es Destacada?'),
                TernaryFilter::make('disponible_renta')
                    ->label('¿En Renta?'),
            ])

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
