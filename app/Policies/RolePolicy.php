<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function UserView(User $user, User $model): bool
    {
        return $model->role_id === Role::getUserRoleID();
    }

    public function AdminView(User $user, User $model): bool
    {
        return $model->role_id === Role::getAdminRoleID();
    }

    public function ManagerView(User $user, User $model): bool
    {
        return $model->role_id === Role::getManagerRoleID();
    }
}
