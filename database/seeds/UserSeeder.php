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
            'photo' => 'test',
            'title_eng' => 'title eng test',
            'title_srb' => 'title srb test',
            'discription_short' => 'opis kratko test',
            'discription_long' => 'opis dugo test',
            'autor' => ' autor test',
            'price' => 2222,
            'page_num' => 2580,
            'deadline' => 'rok test',
            'book_pdf' => 'pdf link',
            'book_cover' => 'book_cover'

        ]);
    }
}
