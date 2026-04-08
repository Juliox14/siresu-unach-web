<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Aliado;
use Illuminate\Auth\Access\HandlesAuthorization;

class AliadoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Aliado');
    }

    public function view(AuthUser $authUser, Aliado $aliado): bool
    {
        return $authUser->can('View:Aliado');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Aliado');
    }

    public function update(AuthUser $authUser, Aliado $aliado): bool
    {
        return $authUser->can('Update:Aliado');
    }

    public function delete(AuthUser $authUser, Aliado $aliado): bool
    {
        return $authUser->can('Delete:Aliado');
    }

    public function restore(AuthUser $authUser, Aliado $aliado): bool
    {
        return $authUser->can('Restore:Aliado');
    }

    public function forceDelete(AuthUser $authUser, Aliado $aliado): bool
    {
        return $authUser->can('ForceDelete:Aliado');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Aliado');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Aliado');
    }

    public function replicate(AuthUser $authUser, Aliado $aliado): bool
    {
        return $authUser->can('Replicate:Aliado');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Aliado');
    }

}