<?php

namespace App\Http\Controllers;

use App\Models\Book\BookModel;
use App\Repositories\Book\BookRepository;
use App\UtilityHelpers\UtilityHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    /**
     * @var BookRepository
     */
    protected $bookHandler;


    /**
     * UserController constructor.
     *
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookHandler = new $bookRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookHandler->getAllBooks();

        if (empty($books))
        {
            return response()->json(['message' => trans('response.nodata')], 404);
        }

        return response()->json($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $valid = Validator::make($params, BookModel::$rules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('response.invalid')), 400);
        }

        if (!$this->bookHandler->createNewBook($params))
        {
            return response()->json([ 'message' => trans('response.not_created') ], 500);
        }

        return response()->json([ 'message' => trans('response.created') ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookHandler->getBookById($id);

        if (!$book)
        {
            return response()->json([ 'message' => trans('response.not_found') ], 404);
        }

        return response()->json($book, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();

        $valid = Validator::make($params, BookModel::$rules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('response.invalid')), 400);
        }

        if (!$this->bookHandler->updateBook($params, $id))
        {
            return response()->json([ 'message' => trans('response.not_updated') ], 500);
        }

        return response()->json([ 'message' => trans('response.updated') ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
