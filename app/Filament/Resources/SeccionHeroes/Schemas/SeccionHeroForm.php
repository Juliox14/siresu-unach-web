<?php

namespace App\Filament\Resources\SeccionHeroes\Schemas;

// ¡OJO! Agregamos estas importaciones para que funcionen los componentes
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SeccionHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Usamos una Sección para agrupar visualmente
                Section::make('Información Principal')
                    ->schema([
                        TextInput::make('titulo')
                            ->label('Título Principal')
                            ->required()
                            ->columnSpanFull(), // Que ocupe todo el ancho

                        Textarea::make('subtitulo')
                            ->label('Subtítulo o Descripción')
                            ->rows(3)
                            ->columnSpanFull(),

                        // CAMBIO CRÍTICO: FileUpload en vez de TextInput
                        FileUpload::make('imagen')
                            ->label('Imagen de Fondo')
                            ->image()
                            ->disk('public') // <--- ¡ESTA LÍNEA ES LA SOLUCIÓN!
                            ->directory('hero')
                            ->visibility('public') // Asegura visibilidad web
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('texto_alt')
                            ->label('Texto Alt (Accesibilidad)')
                            ->helperText('Describe la imagen para personas invidentes.'),
                    ]),

                // Agrupamos los botones en un Grid de 2 columnas
                Section::make('Configuración del Botón')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('texto_boton')
                                    ->label('Texto del Botón')
                                    ->placeholder('Ej: Ver más'),
                                
                                TextInput::make('enlace_boton')
                                    ->label('Enlace (URL)')
                                    ->url() // Valida que sea un link real
                                    ->placeholder('https://...'),
                            ])
                    ])
            ]);
    }
}