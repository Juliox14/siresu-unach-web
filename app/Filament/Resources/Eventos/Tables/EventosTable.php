<?php

namespace App\Filament\Resources\Eventos\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Carbon\Carbon;

class EventosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Portada')
                    ->square() // Las imágenes cuadradas o rectangulares suelen verse mejor para banners de eventos que los círculos.
                    ->imageSize(50)
                    ->defaultImageUrl(url('/images/logo-siresu.png')), // Fallback visual si no hay imagen

                TextColumn::make('titulo')
                    ->label('Detalles del Evento')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    // Agregamos la ubicación como subtítulo para aprovechar el espacio (Ajusta el nombre de tu columna si es diferente)
                    ->description(fn ($record): string => $record->ubicacion ?? 'Sin ubicación especificada')
                    ->wrap(), // Evita que títulos largos rompan el diseño

                TextColumn::make('fecha_evento')
                    ->label('Fecha')
                    ->date('d M Y')
                    ->sortable()
                    // Indicador visual rápido: Te dice si el evento ya pasó o está próximo
                    ->description(fn ($record) => Carbon::parse($record->fecha_evento)->isPast() ? 'Finalizado' : 'Próximo')
                    ->color(fn ($record) => Carbon::parse($record->fecha_evento)->isPast() ? 'gray' : 'primary'),

                TextColumn::make('categoria')
                    ->label('Categoría')
                    ->badge()
                    ->sortable()
                    ->searchable()
                    ->color(fn(string $state): string => match ($state) {
                        'Talleres' => 'warning',
                        'Cultural' => 'purple',
                        'Social' => 'success',
                        'Deportes' => 'info',
                        default => 'gray',
                    }),

                ToggleColumn::make('activo')
                    ->label('Visibilidad')
                    ->sortable(),
            ])
            ->filters([
                // Permite a los editores filtrar rápidamente
                SelectFilter::make('categoria')
                    ->options([
                        'Talleres' => 'Talleres',
                        'Cultural' => 'Cultural',
                        'Social' => 'Social',
                        'Deportes' => 'Deportes',
                    ]),
                TernaryFilter::make('activo')
                    ->label('Estado de Visibilidad'),
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
            // Diseño de la tabla
            ->striped() // Añade un sombreado intercalado a las filas para facilitar la lectura
            ->defaultSort('fecha_evento', 'asc')
            ->emptyStateHeading('No hay eventos')
            ->emptyStateDescription('Crea un nuevo evento para que aparezca aquí.')
            ->emptyStateIcon('heroicon-o-calendar-days');
    }
}