<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();
        DB::table('books')->insert([
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
