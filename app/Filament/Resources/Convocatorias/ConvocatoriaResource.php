<?php

namespace App\Filament\Resources\Convocatorias;

use App\Filament\Resources\Convocatorias\Pages\CreateConvocatoria;
use App\Filament\Resources\Convocatorias\Pages\EditConvocatoria;
use App\Filament\Resources\Convocatorias\Pages\ListConvocatorias;
use App\Filament\Resources\Convocatorias\Schemas\ConvocatoriaForm;
use App\Filament\Resources\Convocatorias\Tables\ConvocatoriasTable;
use App\Models\Convocatoria;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class ConvocatoriaResource extends Resource
{
    protected static ?string $model = Convocatoria::class;

    protected static string | UnitEnum | null $navigationGroup = 'Difusión y Contenido';

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Schema $schema): Schema
    {
        return ConvocatoriaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConvocatoriasTable::configure($table);
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
            'index' => ListConvocatorias::route('/'),
            'create' => CreateConvocatoria::route('/create'),
            'edit' => EditConvocatoria::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        /** @var \App\Models\User $usuario */
        $usuario = Auth::user();

        // Si NO es super admin y tiene un departamento asignado, filtramos la tabla
        if ($usuario && $usuario->role !== 'super_admin' && $usuario->departamento_id) {
            $query->where('departamento_id', $usuario->departamento_id);
        }

        return $query;
    }
}
