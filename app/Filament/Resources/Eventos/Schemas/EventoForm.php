<?php

namespace App\Filament\Resources\Eventos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class EventoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2) // <-- 1. Dividimos el formulario base en 2 columnas
            ->components([

                // ================= COLUMNA IZQUIERDA (50%) =================
                Group::make()->schema([

                    Section::make('Información del Evento')
                        ->schema([
                            TextInput::make('titulo')
                                ->label('Título del Evento')
                                ->required()
                                ->columnSpanFull(),

                            Grid::make(2)->schema([
                                DatePicker::make('fecha_evento')
                                    ->required()
                                    ->label('Fecha del Evento'),

                                TextInput::make('horario')
                                    ->required()
                                    ->placeholder('Ej: 10:00 AM - 01:00 PM'),
                            ]),

                            Grid::make(2)->schema([
                                Select::make('categoria')
                                    ->options([
                                        'Talleres' => 'Talleres y Cursos',
                                        'Cultural' => 'Cultural y Artístico',
                                        'Social' => 'Responsabilidad Social',
                                        'Deportes' => 'Deportes',
                                        'Académico' => 'Académico',
                                    ])
                                    ->required()
                                    ->searchable(),

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

                                // LÓGICA DE ICONOS MEJORADA
                                // Label Campo Icono


                                Group::make([
                                    Grid::make(2)->schema([
                                        Select::make('estilo_icono')
                                            ->label('Estilo del Icono')
                                            ->options([
                                                'o' => 'Outline (Líneas)',
                                                's' => 'Solid (Relleno)',
                                                'm' => 'Mini (Pequeño)',
                                            ])
                                            ->default('o')
                                            ->live() 
                                            ->afterStateHydrated(function (Select $component, ?\Illuminate\Database\Eloquent\Model $record) {
                                                if ($record && $record->icono) {
                                                    preg_match('/^heroicon-([osm])-/', $record->icono, $matches);
                                                    $component->state($matches[1] ?? 'o');
                                                }
                                            })
                                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                                if ($nombre = $get('nombre_icono')) {
                                                    $set('icono', 'heroicon-' . $state . '-' . $nombre);
                                                }
                                            }),

                                        TextInput::make('nombre_icono')
                                            ->label('Nombre del icono')
                                            ->placeholder('Busca en heroicons.com')
                                            ->live(onBlur: true)
                                            ->afterStateHydrated(function (TextInput $component, ?\Illuminate\Database\Eloquent\Model $record) {
                                                if ($record && $record->icono) {
                                                    preg_match('/^heroicon-[osm]-(.+)$/', $record->icono, $matches);
                                                    $component->state($matches[1] ?? str_replace('heroicon-o-', '', $record->icono));
                                                }
                                            })
                                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                                $state = str_replace(['heroicon-o-', 'heroicon-s-', 'heroicon-m-'], '', $state ?? '');
                                                $set('nombre_icono', $state); 
                                                
                                                $estilo = $get('estilo_icono') ?? 'o';
                                                $set('icono', $state ? 'heroicon-' . $estilo . '-' . $state : null);
                                            }),
                                    ]),

                                    // Campo oculto real
                                    Hidden::make('icono')
                                        ->required(),
                                ])->columnSpanFull(),
                            ]),

                            // Moví la descripción aquí para que fluya con la info principal
                            Textarea::make('descripcion')
                                ->label('Descripción del Evento')
                                ->required()
                                ->rows(4)
                                ->columnSpanFull(),

                            TextInput::make('link_inscripcion')
                                ->label('Enlace de Inscripción (Google Forms)')
                                ->url()
                                ->placeholder('https://forms.gle/...')
                                ->helperText('Deja este campo vacío si el evento no requiere registro previo.')
                                ->columnSpanFull(),
                        ]),

                    Section::make('Archivos y Multimedia')
                        ->schema([
                            FileUpload::make('imagen')
                                ->label('Imagen de Portada')
                                ->image()
                                ->directory('eventos')
                                ->disk('public')
                                ->required()
                                ->columnSpanFull(),

                            Repeater::make('archivos')
                                ->label('Añadir documentos relacionados o información adicional')
                                ->relationship()
                                ->schema([
                                    Hidden::make('tipo')->default('documento'),
                                    TextInput::make('nombre')
                                        ->label('Nombre del Archivo o Enlace')
                                        ->required()
                                        ->placeholder('Ej: Programa del Evento'),
                                    FileUpload::make('ruta')
                                        ->label('Subir PDF')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->directory('convocatorias/documentos')
                                        ->disk('public')
                                        ->required()
                                        ->columnSpanFull(),
                                ])
                                ->maxItems(3)
                                ->addActionLabel('Adjuntar PDF')
                                ->columnSpanFull(),

                        ]),

                ])->columnSpan(1), // <-- Termina columna izquierda

                // ================= COLUMNA DERECHA (50%) =================
                Group::make()->schema([

                    Section::make('Ubicación y Mapa')
                        ->schema([
                            TextInput::make('ciudad')
                                ->required()
                                ->placeholder('Ej: Tuxtla Gutiérrez, Chiapas')
                                ->prefixIcon('heroicon-m-map-pin'),

                            TextInput::make('direccion')
                                ->required()
                                ->placeholder('Ej: Auditorio de los Constituyentes')
                                ->prefixIcon('heroicon-m-building-office-2'),

                            Textarea::make('mapa_iframe')
                                ->label('Mapa de Google (Código de inserción)')
                                ->rows(5) // Le di un poco más de altura para que el código grande quepa bien
                                ->placeholder('<iframe src="https://www.google.com/maps/embed?..." ...></iframe>')
                                ->helperText('Ve a Google Maps -> Busca el lugar -> Clic en "Compartir" -> "Insertar un mapa" -> "Copiar HTML" y pégalo aquí.')
                                ->columnSpanFull(),
                        ]),

                    Section::make('Redes Sociales (Opcional)')
                        ->schema([
                            TextInput::make('link_facebook')
                                ->label('Enlace de Facebook')
                                ->url()
                                ->prefix('FB'),

                            TextInput::make('link_instagram')
                                ->label('Enlace de Instagram')
                                ->url()
                                ->prefix('IG'),
                        ])->collapsed(), // Lo mantuve colapsado para que no estorbe si no se usa

                    Section::make('Visibilidad')
                        ->schema([
                            Toggle::make('activo')
                                ->label('Evento Activo y Visible')
                                ->default(true)
                                ->onColor('success'),
                        ]),

                ])->columnSpan(1), // <-- Termina columna derecha

            ]);
    }
}