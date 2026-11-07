<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PedagogicalRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedagogicalRecordPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PedagogicalRecord');
    }

    public function view(AuthUser $authUser, PedagogicalRecord $pedagogicalRecord): bool
    {
        return $authUser->can('View:PedagogicalRecord');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PedagogicalRecord');
    }

    public function update(AuthUser $authUser, PedagogicalRecord $pedagogicalRecord): bool
    {
        return $authUser->can('Update:PedagogicalRecord');
    }

    public function delete(AuthUser $authUser, PedagogicalRecord $pedagogicalRecord): bool
    {
        return $authUser->can('Delete:PedagogicalRecord');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PedagogicalRecord');
    }

    public function restore(AuthUser $authUser, PedagogicalRecord $pedagogicalRecord): bool
    {
        return $authUser->can('Restore:PedagogicalRecord');
    }

    public function forceDelete(AuthUser $authUser, PedagogicalRecord $pedagogicalRecord): bool
    {
        return $authUser->can('ForceDelete:PedagogicalRecord');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PedagogicalRecord');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PedagogicalRecord');
    }

    public function replicate(AuthUser $authUser, PedagogicalRecord $pedagogicalRecord): bool
    {
        return $authUser->can('Replicate:PedagogicalRecord');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PedagogicalRecord');
    }

}