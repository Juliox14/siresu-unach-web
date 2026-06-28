<?php

namespace App\Filament\Resources\Convocatorias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;

class ConvocatoriasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Portada')
                    ->square() 
                    ->imageSize(50)
                    ->disk('public'),

                TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('categoria')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('estado')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Abierta' => 'success',
                        'Próxima' => 'warning',
                        'Cerrada' => 'danger',
                        'Nueva'   => 'info',
                        default   => 'gray',
                    }),

                TextColumn::make('fecha_limite')
                    ->label('Vence')
                    ->date('d M, Y')
                    ->sortable(),

                TextColumn::make('estado_publicacion')
                    ->label('Estado Publicación')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'revision' => 'warning',
                        'publicado' => 'success',
                        'rechazado' => 'danger',
                        default => 'gray',
                    }),

                ToggleColumn::make('activo')
                    ->label('Visible'),
            ])
            ->defaultSort('fecha_limite', 'desc')
            ->filters([
                SelectFilter::make('categoria'),
                SelectFilter::make('estado'),
            ])
            ->recordActions([
                Action::make('previsualizar')
                    ->label('Previsualizar')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (\App\Models\Convocatoria $record) => route('admin.preview.convocatoria', $record))
                    ->openUrlInNewTab(),
                Action::make('aprobar')
                    ->label('Aprobar')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (\App\Models\Convocatoria $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                    ->action(function (\App\Models\Convocatoria $record) {
                        $record->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
                        \Filament\Notifications\Notification::make()->title('Publicada')->success()->send();
                    }),
                Action::make('rechazar')
                    ->label('Rechazar')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (\App\Models\Convocatoria $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                    ->schema([
                        Textarea::make('comentarios_revision')
                            ->label('Comentarios')
                            ->required(),
                    ])
                    ->action(function (\App\Models\Convocatoria $record, array $data) {
                        $record->update(['estado_publicacion' => 'rechazado', 'comentarios_revision' => $data['comentarios_revision']]);
                        \Filament\Notifications\Notification::make()->title('Rechazada')->warning()->send();
                    })
                    ->visible(fn (\App\Models\Convocatoria $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                ,
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
