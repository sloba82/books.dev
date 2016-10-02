<?php

namespace App\Repositories\UserRole;

use App\Models\UserRole\UserRoleModel;

/**
 * Class UserRoleRepository
 * @package App\Repositories\User
 */
class UserRoleRepository
{

    /**
     * Method for getting all users from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUserRoles()
    {
        return UserRoleModel::all();
    }
}
