<?php

namespace App\Filament\Resources\HeaderLogos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class HeaderLogosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Logo')
                    ->disk('public')
                    ->imageHeight(48)
                    ->extraImgAttributes(['style' => 'object-fit: contain;']),

                TextColumn::make('nombre')
                    ->label('Nombre'),

                IconColumn::make('activo')
                    ->label('Visible')
                    ->boolean(),
            ])
            ->defaultSort('orden')
            ->reorderable('orden')
            ->paginated(false)
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
