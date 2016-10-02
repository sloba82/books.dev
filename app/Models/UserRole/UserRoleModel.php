<?php

namespace App\Models\UserRole;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{

    /**
     * @fillable array - defines column names that should be filled in
     */
    protected $fillable = [ 'name' ];

    /**
     * @table string - table name
     */
    protected $table = "user_roles";

}
