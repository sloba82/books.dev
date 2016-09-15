<?php

namespace App\Repositories\Book;

use App\Models\Book\BookModel;

/**
 * Class BookRepository
 * @package App\Repositories\Book
 */
class BookRepository
{
    /**
     * Method for getting all books from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllBooks()
    {
        return BookModel::all();
    }

}