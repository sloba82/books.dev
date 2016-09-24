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

    /**
     * Rules to be passed while creating new book.
     *
     * @var array
     */
    public static $rules = [
        'photo' => 'required|max:256',
        'title_eng' => 'required|max:256',
        'title_srb' => 'required|max:256',
        'discription_short' => 'required',
        'discription_long' => 'required',
        'autor' => 'required|max:512',
        'price' => 'required|intiger|digits_between:1,100000',
        'page_num' => 'required|intiger|digits_between:1,10000',
        'deadline' => 'required|max:32',
        'book_pdf' => 'required|max:256',
        'book_cover' => 'required|max:32'
    ];
}