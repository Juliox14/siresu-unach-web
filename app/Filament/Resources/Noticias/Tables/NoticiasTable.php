<?php

namespace App\Filament\Resources\Noticias\Tables;


use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
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

class NoticiasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen_portada')
                    ->label('Portada')
                    ->square() 
                    ->imageSize(50)
                    ->disk('public'),

                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->weight('bold')
                    ->limit(40),

                TextColumn::make('departamento.nombre')
                    ->label('Departamento')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('fecha_publicacion')
                    ->label('Publicación')
                    ->date('d M, Y')
                    ->sortable(),
                
                TextColumn::make('estado_publicacion')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'revision' => 'warning',
                        'publicado' => 'success',
                        'rechazado' => 'danger',
                        default => 'gray',
                    }),
                    
                ToggleColumn::make('activo')
                    ->label('Visible'),

                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('fecha_publicacion', 'desc') // Las más recientes primero
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('previsualizar')
                    ->label('Previsualizar')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (\App\Models\Noticia $record) => route('admin.preview.noticia', $record))
                    ->openUrlInNewTab(),
                Action::make('aprobar')
                    ->label('Aprobar')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (\App\Models\Noticia $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                    ->action(function (\App\Models\Noticia $record) {
                        $record->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
                        \Filament\Notifications\Notification::make()->title('Publicada')->success()->send();
                    }),
                Action::make('rechazar')
                    ->label('Rechazar')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (\App\Models\Noticia $record) => Auth::user()?->rol === 'super_admin' && $record->estado_publicacion === 'revision')
                    ->schema([
                        Textarea::make('comentarios_revision')
                            ->label('Comentarios')
                            ->required(),
                    ])
                    ->action(function (\App\Models\Noticia $record, array $data) {
                        $record->update(['estado_publicacion' => 'rechazado', 'comentarios_revision' => $data['comentarios_revision']]);
                        \Filament\Notifications\Notification::make()->title('Rechazada')->warning()->send();
                    }),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
