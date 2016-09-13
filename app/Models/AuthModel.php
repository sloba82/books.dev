<?php

namespace App\Models;

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
        'password' => 'required|min:2|max:16'
    ];
}