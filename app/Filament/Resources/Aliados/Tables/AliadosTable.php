<?php

namespace App\Filament\Resources\Aliados\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class AliadosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Logo')
                    ->disk('public')
                    ->imageHeight(40), // Altura de previsualización en la tabla

                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('url')
                    ->icon('heroicon-o-link')
                    ->color('primary')
                    ->openUrlInNewTab(),

                ToggleColumn::make('activo')
                    ->label('Visible'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
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
