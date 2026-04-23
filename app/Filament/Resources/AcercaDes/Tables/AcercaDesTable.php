<?php

namespace App\Filament\Resources\AcercaDes\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class AcercaDesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->description(new HtmlString('
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem; color: #1e40af;">
                    <span>Esta sección es de <b>registro único</b>. Aquí se gestiona la información general, misión y visión del portal.</span>
                </div>
            '))
            ->columns([
                TextColumn::make('estado_visual')
                    ->label('Sección Pública')
                    ->default('Activa y Visible')
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-m-check-circle'),

                TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime('d/m/Y h:i A')
                    ->color('gray')
                    ->description('Última vez que se modificó la información'),
            ])
            ->paginated(false)
            ->recordActions([
                EditAction::make()
                    ->label('Editar Información')
                    ->button()
                    ->color('primary'),
            ])
            ->toolbarActions([]);
    }
}