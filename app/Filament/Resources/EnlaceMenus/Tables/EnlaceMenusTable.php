<?php

namespace App\Filament\Resources\EnlaceMenus\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;

class EnlaceMenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->label('Título')
                    ->weight('bold'),

                IconColumn::make('es_menu_desplegable')
                    ->label('¿Es Desplegable?')
                    ->boolean(),

                TextColumn::make('hijos_count')
                    ->label('Sub-enlaces')
                    ->counts('hijos')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('url')
                    ->label('Destino')
                    ->color('gray')
                    ->limit(30)
                    ->default('-'),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query->whereNull('padre_id')->orderBy('orden'))
            ->paginated(false)
            ->reorderable('orden')
            ->recordActions([
                EditAction::make(),
            ]);
    }
}