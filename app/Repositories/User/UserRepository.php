<?php

namespace App\Repositories\User;

use App\Models\User\UserModel;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository
{
    /**
     * Method for getting user from db.
     *
     * @param array $credentials
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getUser($credentials)
    {
        return UserModel::where('username', $credentials['username'])
            ->where('password', md5($credentials['password']))
            ->first();
    }

    /**
     * Method for getting all users from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {
        return UserModel::all();
    }

    /**
     * Method for creating new user in db.
     *
     * @param array $params
     * @return bool
     */
    public function createNewUser($params)
    {
        $user = new UserModel();

        $user->username = $params['username'];
        $user->password = md5($params['password']);
	    $user->first_name = $params['first_name'];
	    $user->last_name = $params['last_name'];
        $user->address = $params['address'];
        $user->city = $params['city'];
        $user->medical_institution = $params['medical_institution'];
        $user->role = $params['role'];
        $user->token = $params['token'];
        $user->active = $params['active'];

        return $user->save();
    }

}