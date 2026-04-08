<?php

namespace App\Filament\Resources\Noticias;

use App\Filament\Resources\Noticias\Pages\CreateNoticia;
use App\Filament\Resources\Noticias\Pages\EditNoticia;
use App\Filament\Resources\Noticias\Pages\ListNoticias;
use App\Filament\Resources\Noticias\Schemas\NoticiaForm;
use App\Filament\Resources\Noticias\Tables\NoticiasTable;
use App\Models\Noticia;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static string | UnitEnum | null $navigationGroup = 'Difusión y Contenido';

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Schema $schema): Schema
    {
        return NoticiaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NoticiasTable::configure($table);
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
            'index' => ListNoticias::route('/'),
            'create' => CreateNoticia::route('/create'),
            'edit' => EditNoticia::route('/{record}/edit'),
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
