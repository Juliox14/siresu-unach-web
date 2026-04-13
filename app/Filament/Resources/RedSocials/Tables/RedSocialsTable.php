<?php

namespace App\Filament\Resources\RedSocials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class RedSocialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Nombre en negritas para que destaque
                TextColumn::make('nombre')
                    ->label('Red Social')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                // 2. Mostrar el nombre del departamento, no el ID numérico
                // Además, le ponemos un estilo de "Etiqueta" (Badge) y manejamos el caso vacío
                TextColumn::make('departamento.nombre')
                    ->label('Departamento')
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        null => 'warning', // Color amarillo si es la red general
                        default => 'info', // Color azul si pertenece a un departamento
                    })
                    ->default('SIRESU (General)')
                    ->searchable()
                    ->sortable(),

                // 3. Acortar URLs largas y permitir copiarlas con un clic
                TextColumn::make('url')
                    ->label('Enlace')
                    ->limit(40)
                    ->copyable()
                    ->tooltip('Clic para copiar el enlace completo')
                    ->searchable(),

                // 4. Un icono visual para saber si está activa o apagada
                IconColumn::make('activo')
                    ->label('Estado')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                // Filtro rápido para que el Super Admin busque por departamento
                SelectFilter::make('departamento_id')
                    ->relationship('departamento', 'nombre')
                    ->label('Filtrar por Departamento'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('departamento_id', 'asc'); // Ordenar por departamento por defecto
    }
}