<?php

namespace App\Http\Controllers;

use App\Models\User\UserModel;
use App\Repositories\User\UserRepository;
use App\UtilityHelpers\UtilityHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $userHandler;


    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userHandler = new $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!UtilityHelpers::getUserFromJWT())
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $users = $this->userHandler->getAllUsers();
        if (empty($users))
        {
            return response()->json(['message' => trans('response.nodata')], 404);
        }

        return response()->json($users, 200);
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
        if (!UtilityHelpers::getUserFromJWT())
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $params = $request->all();

        $valid = Validator::make($params, UserModel::$rules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('response.invalid')), 400);
        }

        if (!$this->userHandler->createNewUser($params))
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
        if (!UtilityHelpers::getUserFromJWT())
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $user = $this->userHandler->getUserById($id);
        if (!$user)
        {
            return response()->json([ 'message' => trans('response.not_found') ], 404);
        }

        return response()->json($user, 200);
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
        if (!UtilityHelpers::getUserFromJWT())
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $params = $request->all();

        $valid = Validator::make($params, UserModel::$rules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('response.invalid')), 400);
        }

        if (!$this->userHandler->updateUser($params, $id))
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


    /**
     * Method for getting user converted from JWTToken, and his relations orders.
     *
     * @param bool $print_reponse
     * @return object $user
     */
    public function getUserFromJWT($print_reponse = true)
    {
        $user =  json_decode(UtilityHelpers::getUserFromJWT());
        $user->orders;

        return $user;
    }
}
