<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\HeaderLogo;
use Illuminate\Auth\Access\HandlesAuthorization;

class HeaderLogoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:HeaderLogo');
    }

    public function view(AuthUser $authUser, HeaderLogo $headerLogo): bool
    {
        return $authUser->can('View:HeaderLogo');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:HeaderLogo');
    }

    public function update(AuthUser $authUser, HeaderLogo $headerLogo): bool
    {
        return $authUser->can('Update:HeaderLogo');
    }

    public function delete(AuthUser $authUser, HeaderLogo $headerLogo): bool
    {
        return $authUser->can('Delete:HeaderLogo');
    }

    public function restore(AuthUser $authUser, HeaderLogo $headerLogo): bool
    {
        return $authUser->can('Restore:HeaderLogo');
    }

    public function forceDelete(AuthUser $authUser, HeaderLogo $headerLogo): bool
    {
        return $authUser->can('ForceDelete:HeaderLogo');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:HeaderLogo');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:HeaderLogo');
    }

    public function replicate(AuthUser $authUser, HeaderLogo $headerLogo): bool
    {
        return $authUser->can('Replicate:HeaderLogo');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:HeaderLogo');
    }

}