<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label('Nombre Completo')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->helperText(fn(string $context): string => $context === 'create' 
                        ? 'Si se deja en blanco, se generará una contraseña segura aleatoria y se enviará por correo.' 
                        : 'Dejar en blanco para mantener la contraseña actual.')
                    ->maxLength(255),


                Select::make('roles')
                    ->label('Rol en el Sistema')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),

                Select::make('departamento_id')
                    ->label('Departamento al que pertenece')
                    ->relationship('departamento', 'nombre')
                    ->searchable()
                    ->preload(),
            ]);
    }
}
