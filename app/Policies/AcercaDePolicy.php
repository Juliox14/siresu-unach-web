<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AcercaDe;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcercaDePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AcercaDe');
    }

    public function view(AuthUser $authUser, AcercaDe $acercaDe): bool
    {
        return $authUser->can('View:AcercaDe');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AcercaDe');
    }

    public function update(AuthUser $authUser, AcercaDe $acercaDe): bool
    {
        return $authUser->can('Update:AcercaDe');
    }

    public function delete(AuthUser $authUser, AcercaDe $acercaDe): bool
    {
        return $authUser->can('Delete:AcercaDe');
    }

    public function restore(AuthUser $authUser, AcercaDe $acercaDe): bool
    {
        return $authUser->can('Restore:AcercaDe');
    }

    public function forceDelete(AuthUser $authUser, AcercaDe $acercaDe): bool
    {
        return $authUser->can('ForceDelete:AcercaDe');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AcercaDe');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AcercaDe');
    }

    public function replicate(AuthUser $authUser, AcercaDe $acercaDe): bool
    {
        return $authUser->can('Replicate:AcercaDe');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AcercaDe');
    }

}