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
            'photo'  => 'photo path',
            'title_eng'  => 'title eng',
            'title_srb' => 'title srb',
            'discription_short' => 'discription short',
            'discription_long' => 'description long',
            'autor' => 'autor',
            'price' => 2000,
            'page_num'      => 1500,
            'deadline'	=> 'deadline',
            'book_pdf'      => 'pdf path',
            'book_cover'	=> 'boock cover',
        ]);
    }
}
