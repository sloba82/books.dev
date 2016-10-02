<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole\UserRoleModel;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{

    /**
     * define values that will be filled in into table 'user_roles' column='name'
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->truncate();
        $users = [
            [ 'name' => 'admin' ],
            [ 'name' => 'user' ],
        ];

        foreach ($users as $user) {
            UserRoleModel::create($user);
        }
    }
}