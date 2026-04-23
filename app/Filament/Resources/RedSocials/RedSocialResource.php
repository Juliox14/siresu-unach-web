<?php

namespace App\Filament\Resources\RedSocials;

use App\Filament\Resources\RedSocials\Pages\CreateRedSocial;
use App\Filament\Resources\RedSocials\Pages\EditRedSocial;
use App\Filament\Resources\RedSocials\Pages\ListRedSocials;
use App\Filament\Resources\RedSocials\Schemas\RedSocialForm;
use App\Filament\Resources\RedSocials\Tables\RedSocialsTable;
use App\Models\RedSocial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;


class RedSocialResource extends Resource
{
    protected static ?string $model = RedSocial::class;


    protected static ?string $modelLabel = 'Red Social';
    protected static ?string $pluralModelLabel = 'Redes Sociales';

    protected static string | UnitEnum | null $navigationGroup = 'Difusión y Contenido';

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return RedSocialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RedSocialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        /** @var \App\Models\User $usuario */
        $usuario = Auth::user();

        if ($usuario && $usuario->role !== 'super_admin' && $usuario->departamento_id) {
            $query->where('departamento_id', $usuario->departamento_id);
        }

        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRedSocials::route('/'),
            'create' => CreateRedSocial::route('/create'),
            'edit' => EditRedSocial::route('/{record}/edit'),
        ];
    }
}
