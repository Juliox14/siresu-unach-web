<?php

namespace App\Filament\Resources\Noticias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn; // <-- Importación agregada para el switch
use Filament\Tables\Table;

class NoticiasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen_portada')
                    ->label('Portada')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->weight('bold')
                    ->limit(40),

                TextColumn::make('departamento.nombre')
                    ->label('Departamento')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('fecha_publicacion')
                    ->label('Publicación')
                    ->date('d M, Y')
                    ->sortable(),
                
                ToggleColumn::make('activo')
                    ->label('Visible'),

                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('fecha_publicacion', 'desc') // Las más recientes primero
            ->filters([
                //
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