<?php

namespace App\Filament\Resources\Areas\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Filament\Actions\EditAction;

class AreasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // 1. Agregamos el aviso descriptivo en la cabecera de la tabla
            ->description(new HtmlString('
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem; color: #4B5563;">
                    
                    <span><b>Aviso:</b> Las áreas se crean automáticamente al registrar un nuevo Departamento. Haz clic en <b>Gestionar Directorio</b> para agregar o editar el personal de cada área.</span>
                </div>
            '))
            ->columns([
                TextColumn::make('nombre')
                    ->label('Nombre del Área / Departamento')
                    ->searchable()
                    ->weight('bold') // Letra en negrita para que resalte
                    ->icon('heroicon-m-building-office') // Le da un toque corporativo
                    ->iconColor('primary'),

                TextColumn::make('personas_count')
                    ->counts('personas')
                    ->label('Personal Registrado')
                    ->badge() // Lo convierte en una "pastilla" visual
                    // Si tiene empleados se pone verde, si está en cero se pone amarillo de advertencia
                    ->color(fn(int $state): string => $state > 0 ? 'success' : 'warning')
                    // Agregamos un texto extra para que diga "5 personas" en vez de solo "5"
                    ->formatStateUsing(fn(int $state): string => $state === 1 ? '1 persona' : "{$state} personas"),
            ])
            ->reorderable('orden') // Añadir label

            ->defaultSort('orden')
            // 2. Cambiamos la acción por defecto para que sea más descriptiva

            ->reorderRecordsTriggerAction(
                fn(\Filament\Actions\Action $action, bool $isReordering) => $action
                    ->button()
                    ->label($isReordering ? 'Finalizar y Guardar Orden' : 'Reordenar Áreas')
            )
            ->recordActions([
                EditAction::make()
                    ->label('Gestionar Directorio')
                    ->icon('heroicon-m-users')
                    ->color('info'),
            ]);
    }
}
