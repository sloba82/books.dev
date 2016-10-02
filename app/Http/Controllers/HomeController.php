<?php

namespace App\Http\Controllers;

use App\Models\User\UserModel;
use App\Repositories\Book\BookRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        $params = $request->all();
        $userRepo = new UserRepository();

        $valid = Validator::make($params, UserModel::$rules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('response.invalid')), 400);
        }

        if (!$userRepo->createNewUser($params))
        {
            return response()->json([ 'message' => trans('response.not_created') ], 500);
        }

        return response()->json([ 'message' => trans('response.created') ], 200);
    }
}