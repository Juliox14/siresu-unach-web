<?php

declare(strict_types=1);

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\Resources\Roles\RoleResource;
use BezhanSalleh\FilamentShield\Support\Utils;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class EditRole extends EditRecord
{
    public Collection $permissions;

    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $reviewPermissions = [];
        if (!empty($data['revisar_noticias'])) {
            $reviewPermissions[] = 'Review:Noticia';
        }
        if (!empty($data['revisar_eventos'])) {
            $reviewPermissions[] = 'Review:Evento';
        }
        if (!empty($data['revisar_convocatorias'])) {
            $reviewPermissions[] = 'Review:Convocatoria';
        }

        $this->permissions = collect($data)
            ->filter(fn (mixed $permission, string $key): bool => ! in_array($key, ['name', 'guard_name', 'select_all', 'revisar_noticias', 'revisar_eventos', 'revisar_convocatorias', Utils::getTenantModelForeignKey()]))
            ->values()
            ->flatten()
            ->merge($reviewPermissions)
            ->unique();

        if (Utils::isTenancyEnabled() && Arr::has($data, Utils::getTenantModelForeignKey()) && filled($data[Utils::getTenantModelForeignKey()])) {
            return Arr::only($data, ['name', 'guard_name', Utils::getTenantModelForeignKey()]);
        }

        return Arr::only($data, ['name', 'guard_name']);
    }

    protected function afterSave(): void
    {
        $permissionModels = collect();
        $this->permissions->each(function (string $permission) use ($permissionModels): void {
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
                'name' => $permission,
                'guard_name' => $this->data['guard_name'],
            ]));
        });

        // @phpstan-ignore-next-line
        $this->record->syncPermissions($permissionModels);
    }
}
