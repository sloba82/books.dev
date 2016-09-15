<?php

namespace App\Repositories\User;

use App\Models\Book\BookModel;
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

    /**
     * Method for getting user by id from db.
     *
     * If user model is found, method returns user model with relational order models.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserById($id)
    {
        $user = UserModel::find($id);

        if ($user)
        {
            $user->orders;
            $this->getBooksForOrder($user->orders);
        }

        return $user;
    }

    /**
     * Method for updating user in db.
     *
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateUser($params, $id)
    {
        $user = UserModel::find($id);

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

    /**
     * Method for getting books models from orders.
     *
     * @param \Illuminate\Database\Eloquent\Collection $orders
     */
    private function getBooksForOrder($orders)
    {
        foreach ($orders as $order)
        {
            $booksIds = unserialize($order->books);
            $order->books = BookModel::whereIn('id', $booksIds)->get();
        }
    }

    /**
     * Method for getting user by email.
     *
     * @param string $email
     *
     * @return \Illuminate\Database\Eloquent\Model||null
     */
    public function getUserByEmail($email)
    {
        return UserModel::where('username', $email)
            ->first();
    }

    /**
     * Method for setting token for user
     *
     * @param string $token
     * @param int $id
     */
    public function setResetPasswordToken($token, $id)
    {
        UserModel::where('id', $id)
            ->update(['token' => $token]);
    }

}