<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SeccionHero;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeccionHeroPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SeccionHero');
    }

    public function view(AuthUser $authUser, SeccionHero $seccionHero): bool
    {
        return $authUser->can('View:SeccionHero');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SeccionHero');
    }

    public function update(AuthUser $authUser, SeccionHero $seccionHero): bool
    {
        return $authUser->can('Update:SeccionHero');
    }

    public function delete(AuthUser $authUser, SeccionHero $seccionHero): bool
    {
        return $authUser->can('Delete:SeccionHero');
    }

    public function restore(AuthUser $authUser, SeccionHero $seccionHero): bool
    {
        return $authUser->can('Restore:SeccionHero');
    }

    public function forceDelete(AuthUser $authUser, SeccionHero $seccionHero): bool
    {
        return $authUser->can('ForceDelete:SeccionHero');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SeccionHero');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SeccionHero');
    }

    public function replicate(AuthUser $authUser, SeccionHero $seccionHero): bool
    {
        return $authUser->can('Replicate:SeccionHero');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SeccionHero');
    }

}