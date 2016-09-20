<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserModel
 * @package App\Models\User
 */
class UserModel extends Model
{

    /**
     * @var string $table
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
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
     * @var array $hidden
     */
    protected $hidden = [
        'password',
        'token',
    ];

    /**
     * Rules to be passed while authenticate a user.
     *
     * @var array $getUserRules
     */
    public static $getUserRules = [
        'username' => 'required|email',
        'password' => 'required|min:2|max:16'
    ];

    /**
     * Rules to be passed while creating new user.
     *
     * @var array $rules
     */
    public static $rules = [
        'username' => 'required|email|unique:users,username|max:32',
        'password' => 'required|min:5|max:60',
        'first_name' => 'required|min:2|max:16',
        'last_name' => 'required|min:2|max:32',
        'address' => 'required|min:8|max:32',
        'city' => 'required|min:2|max:16',
        'medical_institution' => 'required|min:8|max:64',
        'role' => 'required|integer|exists:user_roles,id',
    ];

    /**
     * Rules to be passed while updating user.
     *
     * @var array $rulesUpdate
     */
    public static $rulesUpdate = [
        'username' => 'required|email|max:32',
        'first_name' => 'required|min:2|max:16',
        'last_name' => 'required|min:2|max:32',
        'address' => 'required|min:8|max:32',
        'city' => 'required|min:2|max:16',
        'medical_institution' => 'required|min:8|max:64',
        'role' => 'required|integer|exists:user_roles,id',
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
     * @var array $requestResetPasswordRules
     */
    public static $requestResetPasswordRules = [
        'username' => 'required|email|exists:users,username|max:32',
    ];

    /**
     * Rules to be passed while resetting password.
     *
     * @var array $resetPasswordRules
     */
    public static $resetPasswordRules = [
        'token' => 'required|max:32',
        'password' => 'required|min:5|max:32',
        'confirm_password' => 'required|same:password',
    ];

    /**
     * Get the user role that owns the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\UserRole\UserRoleModel', 'role', 'id');
    }

    /**
     * Relation: one user model owns any amount of order models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order\OrderModel', 'user_id');
    }
}