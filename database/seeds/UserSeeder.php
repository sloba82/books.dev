<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
        DB::table('users')->insert([
            'username'  => 'user@user.com',
            'password'  => md5('user'),
            'first_name' => 'test',
            'last_name' => 'test',
            'address' => 'test',
            'city' => 'test',
            'medical_institution' => 'test',
            'role'      => 1,
            'active'	=> 1,
        ]);
        }
}