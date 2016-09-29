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
                'username'  => 'admin@admin.com',
                'password'  => md5('admin'),
                'first_name' => 'admin',
                'last_name' => 'admin',
                'address' => 'admin',
                'city' => 'admin',
                'phone' => rand(111111, 999999),
                'medical_institution' => 'admin',
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
                'phone' => rand(111111, 999999),
                'medical_institution' => 'test',
                'role'      => 2,
                'active'	=> 1,
            ],
            [

                'username'  => 'user3@user.com',
                'password'  => md5('user3'),
                'first_name' => 'test',
                'last_name' => 'test',
                'address' => 'test',
                'city' => 'test',
                'phone' => rand(111111, 999999),
                'medical_institution' => 'test',
                'role'      => 2,
                'active'	=> 1,
            ],
        ];

        foreach ($users as $user) {
            UserModel::create($user);
        }
    }
}
