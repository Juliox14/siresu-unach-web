<?php

namespace App\Filament\Resources\Noticias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;

class NoticiaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contenido de la Noticia')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('titulo')
                                ->required()
                                ->live(onBlur: true) // Reacciona al escribir
                                ->afterStateUpdated(
                                    fn(string $operation, $state, Set $set) =>
                                    $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                ),

                            TextInput::make('slug')
                                ->required()
                                ->disabled() // No se edita manualmente
                                ->dehydrated() // Pero sí se guarda en BD
                                ->unique(ignoreRecord: true),
                        ]),
                        Select::make('departamento_id')
                            ->label('Departamento')
                            ->relationship('departamento', 'nombre')
                            ->default(fn() => Auth::user()?->departamento_id)
                            ->disabled(function () {
                                /** @var \App\Models\User $user */
                                $user = Auth::user();

                                return $user ? ! $user->hasRole('super_admin') : false;
                            })
                            ->dehydrated()
                            ->required(),

                        Textarea::make('resumen')
                            ->label('Resumen corto (para la tarjeta de inicio)')
                            ->rows(2)
                            ->required(),

                        RichEditor::make('contenido')
                            ->label('Cuerpo de la noticia')
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['table', 'attachFiles'],
                                ['undo', 'redo'],
                            ])
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('autor_texto')
                            ->label('Autor del texto / Redacción')
                            ->placeholder('Ej. Mtra. Mónica Guillén Sánchez')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        FileUpload::make('imagen_portada')
                            ->image()
                            ->directory('noticias')
                            ->disk('public')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('autor_imagen')
                            ->label('Crédito de la fotografía')
                            ->placeholder('Ej. Archivo SIRESU / Juan Pérez')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            DatePicker::make('fecha_publicacion')
                                ->default(now())
                                ->required(),

                            Toggle::make('activo')
                                ->default(true)
                                ->label('Publicar inmediatamente'),
                        ]),

                    ])
            ]);
    }
}
