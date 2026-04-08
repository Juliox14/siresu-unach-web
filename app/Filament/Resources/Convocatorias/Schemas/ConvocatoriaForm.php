<?php

namespace App\Filament\Resources\Convocatorias\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;



class ConvocatoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                Group::make()->schema([
                    Section::make('Información General')
                        ->schema([
                            TextInput::make('titulo')
                                ->label('Titulo de la Convocatoria')
                                ->placeholder('Ej. Convocatoria de Becas 2026')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(
                                    fn(string $operation, $state, callable $set) =>
                                    $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                ),


                            TextInput::make('slug')
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->unique(ignoreRecord: true),

                            Grid::make(2)->schema([
                                Select::make('categoria')
                                    ->options([
                                        'BECAS' => 'Becas',
                                        'APOYO FEDERAL' => 'Apoyo Federal',
                                        'ACADÉMICO' => 'Académico',
                                        'INVESTIGACIÓN' => 'Investigación',
                                        'CULTURA' => 'Cultura',
                                        'DEPORTES' => 'Deportes',
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
                                
                                Select::make('estado')
                                    ->options([
                                        'Abierta' => 'Abierta (Verde)',
                                        'Próxima' => 'Próxima (Amarillo)',
                                        'Cerrada' => 'Cerrada (Rojo)',
                                        'Nueva' => 'Nueva (Azul)',
                                    ])
                                    ->default('Abierta')
                                    ->required(),
                            ]),

                            RichEditor::make('descripcion_detallada')
                                ->label('Descripción Completa / Bases')
                                ->helperText('Toda la información, requisitos y detalles que se mostrarán en la página individual de la convocatoria.')
                                ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3', 'attachFiles'])
                                ->fileAttachmentsDirectory('convocatorias/rich_text')
                                ->fileAttachmentsDisk('public')
                                ->columnSpanFull(),
                        ]),

                    Section::make('Archivos y Enlaces')
                        ->schema([
                            FileUpload::make('imagen')
                                ->label('Imagen de Portada')
                                ->image()
                                ->directory('convocatorias/portadas')
                                ->disk('public')
                                ->required()
                                ->columnSpanFull(),

                            Repeater::make('archivos')
                                ->label('Documento PDF de la Convocatoria')
                                ->relationship()
                                ->schema([
                                    Hidden::make('tipo')->default('documento'),
                                    Hidden::make('nombre')->default('Bases Oficiales'),

                                    FileUpload::make('ruta')
                                        ->label('Subir PDF')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->directory('convocatorias/documentos')
                                        ->disk('public')
                                        ->required()
                                        ->columnSpanFull(),
                                ])
                                ->maxItems(1)
                                ->addActionLabel('Adjuntar PDF')
                                ->columnSpanFull(),

                            Grid::make(2)->schema([

                                Toggle::make('mostrar_pdf_visualizador')
                                    ->label('Visualizador Integrado')
                                    ->helperText('¿Mostrar el PDF abierto? (Si está apagado, solo habrá un botón de descarga).')
                                    ->onColor('success')
                                    ->default(false),

                                TextInput::make('link_externo')
                                    ->label('Enlace Externo (Opcional)')
                                    ->url()
                                    ->prefix('https://')
                                    ->placeholder('www.becasbenito.gob.mx'),
                            ]),
                        ]),
                ])->columnSpan(1),

                Group::make()->schema([
                    Section::make('Fechas y Visibilidad')
                        ->schema([
                            DatePicker::make('fecha_limite')
                                ->label('Fecha Límite')
                                ->required()
                                ->native(false)
                                ->displayFormat('d/m/Y')
                                ->helperText('De aquí se extraerá el día y mes para el diseño.'),

                            Toggle::make('activo')
                                ->label('Visible al público')
                                ->default(true)
                                ->onColor('success')
                                ->offColor('danger'),
                        ]),
                ])->columnSpan(1),


            ]);
    }
}
