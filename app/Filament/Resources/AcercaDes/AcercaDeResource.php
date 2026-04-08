<?php

namespace App\Filament\Resources\AcercaDes;

use App\Filament\Resources\AcercaDes\Pages\CreateAcercaDe;
use App\Filament\Resources\AcercaDes\Pages\EditAcercaDe;
use App\Filament\Resources\AcercaDes\Pages\ListAcercaDes;
use App\Filament\Resources\AcercaDes\Schemas\AcercaDeForm;
use App\Filament\Resources\AcercaDes\Tables\AcercaDesTable;
use App\Models\AcercaDe;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AcercaDeResource extends Resource
{
    protected static ?string $model = AcercaDe::class;

    protected static string | UnitEnum | null $navigationGroup = 'Institucional';

    public static function getModelLabel(): string
    {
        return 'Acerca de';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Acerca de';
    }

    public static function getNavigationLabel(): string
    {
        return 'Acerca de';
    }

    public static function form(Schema $schema): Schema
    {
        return AcercaDeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcercaDesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAcercaDes::route('/'),
            'create' => CreateAcercaDe::route('/create'),
            'edit' => EditAcercaDe::route('/{record}/edit'),
        ];
    }
}
