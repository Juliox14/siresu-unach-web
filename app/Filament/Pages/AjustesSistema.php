<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Actions\Action;
use App\Models\Configuracion;
use Filament\Notifications\Notification;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class AjustesSistema extends Page implements HasForms
{
    use InteractsWithForms;
    use HasPageShield;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Ajustes del Sistema';
    protected static ?string $title = 'Ajustes del Sistema';

    protected string $view = 'filament.pages.ajustes-sistema';

    public ?array $data = [];

    public function mount(): void
    {
        $configs = Configuracion::all()->pluck('valor', 'clave')->toArray();
        // convert to boolean if necessary
        foreach ($configs as $key => $value) {
            $configs[$key] = $value == '1' ? true : false;
        }
        $this->form->fill($configs);
    }

    public function form(Schema $schema): Schema
{
    return $schema
        ->schema([
            Section::make('Control de Publicaciones')
                ->description('Activa o desactiva la revisión obligatoria por parte del Administrador antes de que el contenido sea público.')
                ->schema([
                    Toggle::make('requerir_aprobacion_noticias')
                        ->label('Requerir aprobación para publicar noticias'),
                    
                    Toggle::make('requerir_aprobacion_eventos')
                        ->label('Requerir aprobación para publicar eventos'),
                    
                    Toggle::make('requerir_aprobacion_convocatorias')
                        ->label('Requerir aprobación para publicar convocatorias'),
                ])
                ->columns(1),
        ])
        ->statePath('data');
}

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Guardar Cambios')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $clave => $valor) {
            $config = Configuracion::where('clave', $clave)->first();
            $oldValue = $config ? $config->valor : '0';
            $newValue = $valor ? '1' : '0';

            Configuracion::updateOrCreate(
                ['clave' => $clave],
                ['valor' => $newValue]
            );

            // Si se desactivó la aprobación (pasó de 1 a 0)
            if ($oldValue === '1' && $newValue === '0') {
                if ($clave === 'requerir_aprobacion_noticias') {
                    \App\Models\Noticia::where('estado_publicacion', 'revision')->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
                } elseif ($clave === 'requerir_aprobacion_eventos') {
                    \App\Models\Evento::where('estado_publicacion', 'revision')->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
                } elseif ($clave === 'requerir_aprobacion_convocatorias') {
                    \App\Models\Convocatoria::where('estado_publicacion', 'revision')->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
                }
            }
        }

        Notification::make()
            ->success()
            ->title('Ajustes guardados')
            ->send();
    }
}
