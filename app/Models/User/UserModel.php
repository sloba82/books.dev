<?php

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class UserModel
 * @package App\Models\User
 */
class UserModel extends Authenticatable
{

    /**
     * @var string $table
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'address',
        'city',
        'medical_institution',
        'role',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'token',
    ];

    /**
     * Rules to be passed while creating new user.
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required|email|unique:users,username|max:32',
        'password' => 'required|min:5|max:60',
        'first_name' => 'required|min:2|max:16',
        'last_name' => 'required|min:2|max:32',
        'address' => 'required|min:8|max:32',
        'city' => 'required|min:2|max:16',
        'medical_institution' => 'required|min:8|max:64',
//        'role' => 'required|integer|exists:user_roles,id',
    ];

    /**
     * Rules to be passed while sending mail.
     *
     * @var array $sendMailRules
     */
    public static $sendMailRules = [
        'message' => 'required',
        'title' => 'required|max:32',
    ];

    /**
     * Rules to be passed while requesting reset password.
     *
     * @var array
     */
    public static $requestResetPasswordRules = [
        'username' => 'required|email|max:32',
    ];

    /**
     * Rules to be passed while resetting password.
     *
     * @var array
     */
    public static $resetPasswordRules = [
        'token' => 'required|max:32',
        'password' => 'required|min:5|max:32',
        'confirm_password' => 'required|same:password',
    ];
}