<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\RedSocial;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedSocialPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:RedSocial');
    }

    public function view(AuthUser $authUser, RedSocial $redSocial): bool
    {
        return $authUser->can('View:RedSocial');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:RedSocial');
    }

    public function update(AuthUser $authUser, RedSocial $redSocial): bool
    {
        return $authUser->can('Update:RedSocial');
    }

    public function delete(AuthUser $authUser, RedSocial $redSocial): bool
    {
        return $authUser->can('Delete:RedSocial');
    }

    public function restore(AuthUser $authUser, RedSocial $redSocial): bool
    {
        return $authUser->can('Restore:RedSocial');
    }

    public function forceDelete(AuthUser $authUser, RedSocial $redSocial): bool
    {
        return $authUser->can('ForceDelete:RedSocial');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:RedSocial');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:RedSocial');
    }

    public function replicate(AuthUser $authUser, RedSocial $redSocial): bool
    {
        return $authUser->can('Replicate:RedSocial');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:RedSocial');
    }

}