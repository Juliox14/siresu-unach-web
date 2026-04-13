<?php

namespace App\Filament\Resources\RedSocials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;


class RedSocialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Select::make('departamento_id')
                    ->relationship('departamento', 'nombre')
                    ->label('Departamento')
                    // Autocompleta con el departamento del usuario logueado
                    ->placeholder('SIRESU - General')
                    ->default(fn() => Auth::user()?->departamento_id)
                    ->disabled(function () {
                        /** @var \App\Models\User $user */
                        $user = Auth::user();

                        return $user ? ! $user->hasRole('super_admin') : false;
                    })
                    ->dehydrated(),

                TextInput::make('nombre')
                    ->required()
                    ->placeholder('Ej: TikTok, Facebook')
                    // Validación para que no repitan la misma red en SU departamento
                    ->unique(modifyRuleUsing: function (Unique $rule, callable $get) {
                        return $rule->where('departamento_id', $get('departamento_id'));
                    }, ignoreRecord: true),

                TextInput::make('url')
                    ->label('Enlace (URL)')
                    ->url()
                    ->required(),


                Toggle::make('activo')
                    ->default(true)
                    ->columnSpanFull(),

            ]);
    }
}
