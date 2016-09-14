<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User\UserModel;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            [
                'username'  => 'user1@user.com',
                'password'  => md5('user1'),
                'first_name' => 'test',
                'last_name' => 'test',
                'address' => 'test',
                'city' => 'test',
                'medical_institution' => 'test',
                'role'      => 1,
                'active'	=> 1,
            ],
            [

                'username'  => 'user2@user.com',
                'password'  => md5('user2'),
                'first_name' => 'test',
                'last_name' => 'test',
                'address' => 'test',
                'city' => 'test',
                'medical_institution' => 'test',
                'role'      => 1,
                'active'	=> 1,
            ],
            [

                'username'  => 'user3@user.com',
                'password'  => md5('user3'),
                'first_name' => 'test',
                'last_name' => 'test',
                'address' => 'test',
                'city' => 'test',
                'medical_institution' => 'test',
                'role'      => 1,
                'active'	=> 1,
            ],
        ];

        foreach ($users as $user) {
            UserModel::create($user);
        }
    }
}
