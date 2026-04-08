<?php

namespace App\Filament\Resources\Departamentos\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class DepartamentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->label('Departamento')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary')
                    ->icon('heroicon-o-building-office-2'), // Le da un toque visual muy limpio

                TextColumn::make('slug')
                    ->label('Ruta Web (Slug)')
                    ->searchable()
                    ->color('gray')
                    ->icon('heroicon-m-link')
                    ->copyable() // ¡Magia! Permite copiar el texto con un clic
                    ->copyMessage('Ruta copiada al portapapeles')
                    ->copyMessageDuration(1500),

                TextColumn::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime('d M, Y') // Formato amigable (ej. 18 Feb, 2026)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Lo oculta por defecto para no saturar
            ])
            ->filters([
                // Como son pocos departamentos, no hace falta saturar con filtros aquí
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateIcon('heroicon-o-building-library')
            ->emptyStateHeading('No hay departamentos registrados')
            ->emptyStateDescription('Comienza agregando las direcciones de SIRESU (ej. Dirección Editorial).');
    }
}