<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{

    protected $table = "books";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'title_eng',
        'title_srb',
        'discription_short',
        'discription_long',
        'autor',
        'price',
        'page_num',
        'deadline',
        'book_pdf',
        'book_cover'
    ];
}