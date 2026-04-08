<?php

namespace App\Filament\Resources\SeccionHeroes;

use App\Filament\Resources\SeccionHeroes\Pages\CreateSeccionHero;
use App\Filament\Resources\SeccionHeroes\Pages\EditSeccionHero;
use App\Filament\Resources\SeccionHeroes\Pages\ListSeccionHeroes;
use App\Filament\Resources\SeccionHeroes\Schemas\SeccionHeroForm;
use App\Filament\Resources\SeccionHeroes\Tables\SeccionHeroesTable;
use App\Models\SeccionHero;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SeccionHeroResource extends Resource
{
    protected static ?string $model = SeccionHero::class;

    protected static ?string $recordTitleAttribute = 'titulo';

    protected static string | UnitEnum | null $navigationGroup = 'Página de Inicio';


    protected static ?string $navigationLabel = 'Portada (Hero)';

    protected static ?string $modelLabel = 'Sección Hero';

    protected static ?string $pluralModelLabel = 'Secciones Hero';

    // -------------------------------------------

    public static function form(Schema $schema): Schema
    {
        return SeccionHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SeccionHeroesTable::configure($table);
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
            'index' => ListSeccionHeroes::route('/'),
            'create' => CreateSeccionHero::route('/create'),
            'edit' => EditSeccionHero::route('/{record}/edit'),
        ];
    }
}
