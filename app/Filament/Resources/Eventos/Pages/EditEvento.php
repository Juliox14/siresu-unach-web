<?php

namespace App\Filament\Resources\Eventos\Pages;

use App\Filament\Resources\Eventos\EventoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\Auth;

class EditEvento extends EditRecord
{
    protected static string $resource = EventoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('aprobar')
                ->label('Aprobar Publicación')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn (\App\Models\Evento $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                ->action(function () {
                    $this->record->update([
                        'estado_publicacion' => 'publicado',
                        'comentarios_revision' => null,
                    ]);
                    \Filament\Notifications\Notification::make()->title('Publicación aprobada')->success()->send();
                    $this->refreshFormData(['estado_publicacion']);
                }),
            
            \Filament\Actions\Action::make('rechazar')
                ->label('Rechazar Publicación')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->visible(fn (\App\Models\Evento $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                ->schema([
                    \Filament\Forms\Components\Textarea::make('comentarios_revision')
                        ->label('Comentarios para el editor')
                        ->required(),
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'estado_publicacion' => 'rechazado',
                        'comentarios_revision' => $data['comentarios_revision'],
                    ]);
                    \Filament\Notifications\Notification::make()->title('Publicación rechazada')->warning()->send();
                    $this->refreshFormData(['estado_publicacion']);
                }),

            \Filament\Actions\Action::make('previsualizar')
                ->label('Previsualizar')
                ->color('info')
                ->icon('heroicon-o-eye')
                ->url(fn () => route('admin.preview.evento', $this->record))
                ->openUrlInNewTab(),
                
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (Auth::user()?->rol !== 'super_admin') {
            if (\App\Models\Configuracion::requiereAprobacionEventos()) {
                $data['estado_publicacion'] = 'revision';
            }
            $data['comentarios_revision'] = null;
        }
        return $data;
    }

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }
}
