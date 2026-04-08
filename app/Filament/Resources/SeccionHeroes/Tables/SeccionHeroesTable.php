<?php

namespace App\Filament\Resources\SeccionHeroes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
// Importamos ImageColumn para ver la foto
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SeccionHeroesTable
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
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                // Ocultamos columnas que no son vitales en la tabla para no saturar
                TextColumn::make('texto_boton')
                    ->label('Botón')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Última Edición')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([ // Nota: En tu versión es toolbarActions, no bulkActions sueltas
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
