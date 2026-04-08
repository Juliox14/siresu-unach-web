<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\EnlaceRapido;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnlaceRapidoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:EnlaceRapido');
    }

    public function view(AuthUser $authUser, EnlaceRapido $enlaceRapido): bool
    {
        return $authUser->can('View:EnlaceRapido');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:EnlaceRapido');
    }

    public function update(AuthUser $authUser, EnlaceRapido $enlaceRapido): bool
    {
        return $authUser->can('Update:EnlaceRapido');
    }

    public function delete(AuthUser $authUser, EnlaceRapido $enlaceRapido): bool
    {
        return $authUser->can('Delete:EnlaceRapido');
    }

    public function restore(AuthUser $authUser, EnlaceRapido $enlaceRapido): bool
    {
        return $authUser->can('Restore:EnlaceRapido');
    }

    public function forceDelete(AuthUser $authUser, EnlaceRapido $enlaceRapido): bool
    {
        return $authUser->can('ForceDelete:EnlaceRapido');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:EnlaceRapido');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:EnlaceRapido');
    }

    public function replicate(AuthUser $authUser, EnlaceRapido $enlaceRapido): bool
    {
        return $authUser->can('Replicate:EnlaceRapido');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:EnlaceRapido');
    }

}