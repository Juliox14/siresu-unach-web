<?php

namespace App\Filament\Resources\Instalacions;

use App\Filament\Resources\Instalacions\Pages\CreateInstalacion;
use App\Filament\Resources\Instalacions\Pages\EditInstalacion;
use App\Filament\Resources\Instalacions\Pages\ListInstalacions;
use App\Filament\Resources\Instalacions\Schemas\InstalacionForm;
use App\Filament\Resources\Instalacions\Tables\InstalacionsTable;
use App\Models\Instalacion;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class InstalacionResource extends Resource
{
    protected static ?string $model = Instalacion::class;

    protected static string | UnitEnum | null $navigationGroup = 'Institucional';
    
    protected static ?string $modelLabel = 'Instalación';
    protected static ?string $pluralModelLabel = 'Instalaciones';

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return InstalacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstalacionsTable::configure($table);
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
            'index' => ListInstalacions::route('/'),
            'create' => CreateInstalacion::route('/create'),
            'edit' => EditInstalacion::route('/{record}/edit'),
        ];
    }
}
