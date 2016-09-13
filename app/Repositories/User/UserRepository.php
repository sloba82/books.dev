<?php

namespace App\Repositories\User;

use App\Models\User\UserModel;

class UserRepository
{
    public static function getUser($credentials)
    {
        return UserModel::where('username', $credentials['username'])
            ->where('password', md5($credentials['password']))
            ->first();
    }

}