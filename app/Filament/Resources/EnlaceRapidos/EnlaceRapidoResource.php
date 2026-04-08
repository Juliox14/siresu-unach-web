<?php

namespace App\Filament\Resources\EnlaceRapidos;

use App\Filament\Resources\EnlaceRapidos\Pages\CreateEnlaceRapido;
use App\Filament\Resources\EnlaceRapidos\Pages\EditEnlaceRapido;
use App\Filament\Resources\EnlaceRapidos\Pages\ListEnlaceRapidos;
use App\Filament\Resources\EnlaceRapidos\Schemas\EnlaceRapidoForm;
use App\Filament\Resources\EnlaceRapidos\Tables\EnlaceRapidosTable;
use App\Models\EnlaceRapido;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class EnlaceRapidoResource extends Resource
{
    protected static ?string $model = EnlaceRapido::class;

    protected static ?string $recordTitleAttribute = 'titulo';

    protected static string | UnitEnum | null $navigationGroup = 'Página de Inicio';

    public static function form(Schema $schema): Schema
    {
        return EnlaceRapidoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnlaceRapidosTable::configure($table);
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
            'index' => ListEnlaceRapidos::route('/'),
            'create' => CreateEnlaceRapido::route('/create'),
            'edit' => EditEnlaceRapido::route('/{record}/edit'),
        ];
    }
}
