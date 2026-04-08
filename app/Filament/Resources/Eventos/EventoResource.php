<?php

namespace App\Filament\Resources\Eventos;

use App\Filament\Resources\Eventos\Pages\CreateEvento;
use App\Filament\Resources\Eventos\Pages\EditEvento;
use App\Filament\Resources\Eventos\Pages\ListEventos;
use App\Filament\Resources\Eventos\Schemas\EventoForm;
use App\Filament\Resources\Eventos\Tables\EventosTable;
use App\Models\Evento;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EventoResource extends Resource
{
    protected static ?string $model = Evento::class;

    protected static string | UnitEnum | null $navigationGroup = 'Difusión y Contenido';

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Schema $schema): Schema
    {
        return EventoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventosTable::configure($table);
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
            'index' => ListEventos::route('/'),
            'create' => CreateEvento::route('/create'),
            'edit' => EditEvento::route('/{record}/edit'),
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
