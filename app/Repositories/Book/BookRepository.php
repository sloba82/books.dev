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

    /**
     * Method for creating new book in db.
     *
     * @param array $params
     * @return bool
     */
    public function createNewBook($params)
    {
        $book = new BookModel();

        $book->photo = $params['photo'];
        $book->title_eng = $params['title_eng'];
        $book->title_srb =$params['title_srb'];
        $book->discription_short = $params['discription_short'];
        $book->discription_long = $params['discription_long'];
        $book->autor = $params['autor'];
        $book->price = $params['price'];
        $book->page_num = $params['page_num'];
        $book->deadline = $params['deadline'];
        $book->book_pdf = $params['book_pdf'];
        $book->book_cover = $params['book_cover'];

        return $book->save();
    }

    /**
     * Method for getting book by id from db.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getBookById($id)
    {
        return BookModel::find($id);
    }

    /**
     * Method for updating book in db.
     *
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateBook($params, $id)
    {
        $book = BookModel::find($id);

        $book->photo = $params['photo'];
        $book->title_eng = $params['title_eng'];
        $book->title_srb =$params['title_srb'];
        $book->discription_short = $params['discription_short'];
        $book->discription_long = $params['discription_long'];
        $book->autor = $params['autor'];
        $book->price = $params['price'];
        $book->page_num = $params['page_num'];
        $book->deadline = $params['deadline'];
        $book->book_pdf = $params['book_pdf'];
        $book->book_cover = $params['book_cover'];

        return $book->save();
        var_dump($book->save());
    }
}