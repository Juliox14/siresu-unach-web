<?php

namespace App\Filament\Resources\EnlaceMenus;

use App\Filament\Resources\EnlaceMenus\Pages\CreateEnlaceMenu;
use App\Filament\Resources\EnlaceMenus\Pages\EditEnlaceMenu;
use App\Filament\Resources\EnlaceMenus\Pages\ListEnlaceMenus;
use App\Filament\Resources\EnlaceMenus\Schemas\EnlaceMenuForm;
use App\Filament\Resources\EnlaceMenus\Tables\EnlaceMenusTable;
use App\Models\EnlaceMenu;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class EnlaceMenuResource extends Resource
{
    protected static ?string $model = EnlaceMenu::class;

    protected static ?string $modelLabel = 'Enlace de Menú';
    protected static ?string $pluralModelLabel = 'Enlaces de Menú';

    protected static string | UnitEnum | null $navigationGroup = 'Header';

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Schema $schema): Schema
    {
        return EnlaceMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnlaceMenusTable::configure($table);
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
            'index' => ListEnlaceMenus::route('/'),
            'create' => CreateEnlaceMenu::route('/create'),
            'edit' => EditEnlaceMenu::route('/{record}/edit'),
        ];
    }
}
