<?php

namespace App\Models\AuthModel;

use Illuminate\Database\Eloquent\Model;


class AuthModel extends Model
{
    /**
     * Rules to be respected before creating new and updating tyre
     *
     * @var array $rules
     */
    public static $validationRules = [
        'username' => 'required|email',
        'password' => 'required|min:8|max:16'
    ];
}