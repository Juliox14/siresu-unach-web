<?php

namespace App\Filament\Resources\Departamentos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;

class DepartamentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // ================= SECCIÓN 1: TODO LO GENERAL =================
                Section::make('Información Principal del Departamento')
                    ->description('Datos de identificación y presentación de la Dirección.')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre del Departamento')
                            ->placeholder('Ej. Dirección Editorial')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation, $state, callable $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            )
                            ->columnSpan(1),

                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->unique(ignoreRecord: true)
                            ->columnSpan(1),

                        FileUpload::make('imagen_portada')
                            ->label('Imagen de Portada')
                            ->image()
                            ->directory('departamentos')
                            ->disk('public')
                            ->columnSpanFull(),

                        Textarea::make('descripcion')
                            ->label('Breve descripción del departamento')
                            ->rows(4) // Hace el campo de texto un poco más alto
                            ->columnSpanFull(),
                    ])->columns(2), // Esta sección internamente tiene 2 columnas para el Nombre y Slug

                // ================= SECCIÓN 2: LOS MÓDULOS =================
                Section::make('Módulos / Subsecciones')
                    ->description('Agrega las áreas que pertenecen a este departamento (Ej. Servicio Social, Becas, Deportes).')
                    ->schema([
                        Repeater::make('modulos')
                            ->relationship()
                            ->schema([
                                TextInput::make('titulo')
                                    ->required()
                                    ->label('Título del Módulo')
                                    ->columnSpanFull(),

                                RichEditor::make('descripcion')
                                    ->label('Contenido')
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                        ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                        ['table', 'attachFiles'], // The `customBlocks` and `mergeTags` tools are also added here if those features are used.
                                        ['undo', 'redo'],
                                    ])
                                    ->columnSpanFull(),

                                Repeater::make('archivos') // Llama a la relación que creamos en el modelo
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('nombre')
                                            ->label('Nombre a mostrar (Ej. Descargar Folleto)'),

                                        Select::make('tipo')
                                            ->label('Tipo de Archivo')
                                            ->options([
                                                'imagen' => 'Imagen / Foto',
                                                'pdf' => 'Documento PDF',
                                                'video' => 'Video',
                                            ])
                                            ->required(),

                                        FileUpload::make('ruta')
                                            ->label('Subir Archivo')
                                            ->directory('archivos_adjuntos')
                                            ->disk('public')
                                            ->maxSize(40960)
                                            ->acceptedFileTypes([
                                                'image/jpeg',
                                                'image/png',
                                                'image/webp',
                                                'application/pdf',
                                                'video/mp4',
                                                'video/webm'
                                            ])
                                            ->required(),
                                    ])
                                    ->columns(1)
                                    ->addActionLabel('Agregar otro archivo')
                                    ->collapsible()
                                    ->itemLabel(fn(array $state): ?string => $state['nombre'] ?? null),
                            ])
                            ->columns(1)
                            ->defaultItems(0)
                            ->addActionLabel('Agregar nuevo módulo')
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => $state['titulo'] ?? null),
                    ])
            ])->columns(1);
    }
}
