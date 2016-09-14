<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book\BookModel;


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

        $books = [
            [
                'photo'  => 'photo path 1',
                'title_eng'  => 'title eng 1',
                'title_srb' => 'title srb 1',
                'discription_short' => 'discription short 1',
                'discription_long' => 'description long 1',
                'autor' => 'autor 1',
                'price' => 2000,
                'page_num'      => 1500,
                'deadline'	=> 'deadline 1',
                'book_pdf'      => 'pdf path 1',
                'book_cover'	=> 'boock cover 1',
            ],
            [
                'photo'  => 'photo path 2',
                'title_eng'  => 'title eng 2',
                'title_srb' => 'title srb 2',
                'discription_short' => 'discription short 2',
                'discription_long' => 'description long 2',
                'autor' => 'autor 2',
                'price' => 2000,
                'page_num'      => 1500,
                'deadline'	=> 'deadline 2',
                'book_pdf'      => 'pdf path 2',
                'book_cover'	=> 'boock cover 2',
            ],
            [
                'photo'  => 'photo path 3',
                'title_eng'  => 'title eng 3',
                'title_srb' => 'title srb 3',
                'discription_short' => 'discription short 3',
                'discription_long' => 'description long 3',
                'autor' => 'autor 3',
                'price' => 2000,
                'page_num'      => 1500,
                'deadline'	=> 'deadline 3',
                'book_pdf'      => 'pdf path 3',
                'book_cover'	=> 'boock cover 3',
            ],
            [
                'photo'  => 'photo path 4',
                'title_eng'  => 'title eng 4',
                'title_srb' => 'title srb 4',
                'discription_short' => 'discription short 4',
                'discription_long' => 'description long 4',
                'autor' => 'autor 4',
                'price' => 2000,
                'page_num'      => 1500,
                'deadline'	=> 'deadline 4',
                'book_pdf'      => 'pdf path 4',
                'book_cover'	=> 'boock cover 4',
            ],
        ];

        foreach ($books as $book) {
            BookModel::create($book);
        }
    }
}
