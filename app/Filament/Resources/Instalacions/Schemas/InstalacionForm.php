<?php

namespace App\Filament\Resources\Instalacions\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;

class InstalacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Grid::make(1)
                    ->schema([
                        Group::make()->schema([

                            Section::make('Información General')
                                ->schema([
                                    TextInput::make('nombre')
                                        ->label('Tipo de Instalación')
                                        ->required()
                                        ->placeholder('Ej. Auditorio')
                                        ->maxLength(255),

                                    TextInput::make('subtitulo')
                                        ->label('Nombre de la Instalación (Opcional)')
                                        ->placeholder('Ej. Belisario Domínguez')
                                        ->maxLength(255),

                                    Textarea::make('descripcion_corta')
                                        ->label('Descripción Corta (Para la tarjeta)')
                                        ->required()
                                        ->rows(3)
                                        ->maxLength(500),

                                    TagsInput::make('caracteristicas')
                                        ->label('Características Destacadas (Bullets)')
                                        ->helperText('Escribe una característica y presiona la tecla Enter. Ej: Conciertos, Eventos VIP')
                                        ->placeholder('Agregar característica...')
                                        ->columnSpanFull(),

                                    RichEditor::make('descripcion_detallada')
                                        ->label('Descripción Detallada (Para el modal)')
                                        ->toolbarButtons(['bold', 'italic', 'bulletList', 'link'])
                                        ->fileAttachmentsDirectory('instalaciones/rich_text')
                                        ->fileAttachmentsDisk('public')
                                        ->columnSpanFull(),
                                ])->columns(1),

                            Section::make('Galería de Imágenes y Videos')
                                ->description('Sube las fotos y videos que aparecerán cuando el usuario abra los detalles.')
                                ->schema([
                                    Repeater::make('archivos')
                                        ->relationship()
                                        ->schema([
                                            TextInput::make('nombre')
                                                ->label('Pie de foto / Nombre (Opcional)'),

                                            // Cambiamos el Hidden por un Select para elegir entre imagen o video
                                            Select::make('tipo')
                                                ->label('Tipo de Archivo')
                                                ->options([
                                                    'imagen' => 'Imagen',
                                                    'video' => 'Video',
                                                ])
                                                ->required()
                                                ->default('imagen'),

                                            FileUpload::make('ruta')
                                                ->label('Subir Archivo')
                                                // Quitamos ->image() para que acepte videos también
                                                ->directory('instalaciones/galeria')
                                                ->disk('public')
                                                ->acceptedFileTypes([
                                                    'image/jpeg',
                                                    'image/png',
                                                    'image/webp',
                                                    'video/mp4',
                                                    'video/webm'
                                                ])
                                                ->maxSize(102400) // Permitimos hasta 100MB (en KB) para los videos
                                                ->required()
                                                ->columnSpanFull(),
                                        ])
                                        ->columns(1)
                                        ->addActionLabel('Agregar archivo a la galería')
                                        ->collapsible()
                                        ->defaultItems(0),
                                ]),
                        ])->columnSpan(1),

                        Group::make()->schema([

                            Section::make('Imagen de Portada')
                                ->schema([
                                    FileUpload::make('imagen_portada')
                                        ->hiddenLabel()
                                        ->image()
                                        ->directory('instalaciones/portadas')
                                        ->disk('public')
                                        ->required(),
                                ]),

                            Section::make('Estado y Visibilidad')
                                ->schema([
                                    Toggle::make('es_destacado')
                                        ->label('Instalación Destacada')
                                        ->helperText('Solo puede haber una destacada a la vez. Aparecerá en la página de inicio con diseño gigante.')
                                        ->onColor('warning'),

                                    Toggle::make('disponible_renta')
                                        ->label('Disponible para Renta')
                                        ->helperText('Activa el indicador verde de "Disponible Renta" en la tarjeta.')
                                        ->onColor('success'),
                                ]),

                            Section::make('Datos de Contacto')
                                ->schema([
                                    TextInput::make('telefono')
                                        ->label('Teléfono de Reservaciones')
                                        ->placeholder('Ej. (961) 617-8000')
                                        ->maxLength(255),

                                    TextInput::make('extension')
                                        ->label('Extensión')
                                        ->placeholder('Ej. Ext. 5551')
                                        ->maxLength(255),
                                ]),
                        ])->columnSpan(1),
                    ])
            ]);
    }
}