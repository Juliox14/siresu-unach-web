<?php

namespace App\Filament\Resources\AcercaDes\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\HtmlString;

class AcercaDeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Contenido')
                    ->tabs([
                        Tabs\Tab::make('Héroe e Intro')
                            ->schema([
                                Section::make('Títulos Principales')
                                    ->description('Divide el título para mantener el efecto de color.')
                                    ->schema([
                                        TextInput::make('titulo_1')->label('Título (Parte Normal)')->required(),
                                        TextInput::make('titulo_2')->label('Título (Parte Color)')->required(),
                                    ])->columns(2),

                                Textarea::make('descripcion_hero')
                                    ->label('Descripción Principal')
                                    ->rows(4)
                                    ->required(),

                                Section::make('Imagen Destacada')
                                    ->schema([
                                        FileUpload::make('imagen_principal')
                                            ->image()
                                            ->directory('acerca_de')
                                            ->columnSpanFull()
                                            ->disk('public')
                                            ->required(),

                                        TextInput::make('badge_titulo')->label('Texto Badge (Arriba)'),
                                        TextInput::make('badge_subtitulo')->label('Texto Badge (Abajo)'),
                                    ])->columns(2),
                            ]),

                        Tabs\Tab::make('Puntos y Valores')
                            ->schema([
                                TextInput::make('titulo_puntos')->label('Título Sección Media'),

                                Repeater::make('puntos_clave')
                                    ->label('Puntos Clave (Iconos)')
                                    ->schema([
                                        TextInput::make('titulo')->required(),
                                        Textarea::make('descripcion')->rows(2)->required(),
                                        TextInput::make('icono')
                                            ->required()
                                            ->label('Código del Icono')
                                            ->placeholder('heroicon-o-academic-cap')
                                            ->helperText(new HtmlString('Busca el nombre en <a href="https://heroicons.com" target="_blank" style="color: #2563eb; text-decoration: underline; font-weight: bold;">heroicons.com</a> y antepon "heroicon-o-" (outline) o "heroicon-s-" (solid).')),
                                    ])
                                    ->columns(1),

                                Section::make('Filosofía Institucional')
                                    ->schema([
                                        Textarea::make('mision')->label('Misión')->rows(3),
                                        Textarea::make('vision')->label('Visión')->rows(3),

                                        Repeater::make('valores')
                                            ->label('Lista de Valores')
                                            ->schema([
                                                TextInput::make('valor')->label('Nombre del Valor')->required(),
                                            ])
                                            ->grid(2),
                                    ]),
                            ]),

                        Tabs\Tab::make('Org. y Contacto')
                            ->schema([
                                FileUpload::make('organigrama')
                                    ->image()
                                    ->directory('acerca_de')
                                    ->columnSpanFull()
                                    ->disk('public')
                                    ->required(),

                                Section::make('Datos de Contacto')
                                    ->schema([
                                        Textarea::make('direccion')->rows(3),
                                        TextInput::make('telefono'),
                                        TextInput::make('extension'),
                                        Textarea::make('mapa_iframe')->label('Iframe de Google Maps')->rows(3),
                                    ])->columns(2),

                                Repeater::make('links_rapidos')
                                    ->label('Enlaces Rápidos (Footer Derecho)')
                                    ->schema([
                                        TextInput::make('texto')->label('Texto del Botón')->required(),
                                        TextInput::make('url')->label('Enlace (URL)')->url()->required(),
                                        TextInput::make('icono')
                                            ->required()
                                            ->label('Código del Icono')
                                            ->placeholder('heroicon-o-academic-cap')
                                            ->helperText(new HtmlString('Busca el nombre en <a href="https://heroicons.com" target="_blank" style="color: #2563eb; text-decoration: underline; font-weight: bold;">heroicons.com</a> y antepon "heroicon-o-" (outline) o "heroicon-s-" (solid).')),
                                    ])->columns(2),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}
