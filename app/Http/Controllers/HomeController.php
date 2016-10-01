<?php

namespace App\Http\Controllers;

use App\Repositories\Book\BookRepository;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Method for getting all books for home page when user is not logged in.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBooks()
    {
        $bookRepo = new BookRepository();
        $books = $bookRepo->getAllBooks();

        if (empty($books))
        {
            return response()->json(['message' => trans('response.nodata')], 404);
        }

        return response()->json($books, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBook($id)
    {
        $bookRepo = new BookRepository();
        $book = $bookRepo->getBookById($id);

        if (!$book)
        {
            return response()->json([ 'message' => trans('response.not_found') ], 404);
        }

        return response()->json($book, 200);
    }
}