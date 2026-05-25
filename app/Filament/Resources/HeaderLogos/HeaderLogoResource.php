<?php

namespace App\Filament\Resources\HeaderLogos;

use App\Filament\Resources\HeaderLogos\Pages\CreateHeaderLogo;
use App\Filament\Resources\HeaderLogos\Pages\EditHeaderLogo;
use App\Filament\Resources\HeaderLogos\Pages\ListHeaderLogos;
use App\Filament\Resources\HeaderLogos\Schemas\HeaderLogoForm;
use App\Filament\Resources\HeaderLogos\Tables\HeaderLogosTable;
use App\Models\HeaderLogo;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class HeaderLogoResource extends Resource
{
    protected static ?string $model = HeaderLogo::class;

    protected static ?string $modelLabel = 'Logo';
    protected static ?string $pluralModelLabel = 'Logos';

    protected static string | UnitEnum | null $navigationGroup = 'Header';


    public static function table(Table $table): Table
    {
        return HeaderLogosTable::configure($table);
    }

    public static function form($form): Schema
    {
        return HeaderLogoForm::configure($form);
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
            'index' => ListHeaderLogos::route('/'),
            'create' => CreateHeaderLogo::route('/create'),
            'edit' => EditHeaderLogo::route('/{record}/edit'),
        ];
    }
}
