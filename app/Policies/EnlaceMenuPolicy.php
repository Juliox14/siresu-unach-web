<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\EnlaceMenu;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnlaceMenuPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:EnlaceMenu');
    }

    public function view(AuthUser $authUser, EnlaceMenu $enlaceMenu): bool
    {
        return $authUser->can('View:EnlaceMenu');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:EnlaceMenu');
    }

    public function update(AuthUser $authUser, EnlaceMenu $enlaceMenu): bool
    {
        return $authUser->can('Update:EnlaceMenu');
    }

    public function delete(AuthUser $authUser, EnlaceMenu $enlaceMenu): bool
    {
        return $authUser->can('Delete:EnlaceMenu');
    }

    public function restore(AuthUser $authUser, EnlaceMenu $enlaceMenu): bool
    {
        return $authUser->can('Restore:EnlaceMenu');
    }

    public function forceDelete(AuthUser $authUser, EnlaceMenu $enlaceMenu): bool
    {
        return $authUser->can('ForceDelete:EnlaceMenu');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:EnlaceMenu');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:EnlaceMenu');
    }

    public function replicate(AuthUser $authUser, EnlaceMenu $enlaceMenu): bool
    {
        return $authUser->can('Replicate:EnlaceMenu');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:EnlaceMenu');
    }

}