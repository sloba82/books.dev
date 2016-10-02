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
        $params = $request->all();

//        $valid = Validator::make($params, UserModel::$rulesUpdate);
//        if ($valid->fails()) {
//            return response()->json(array('message' => trans('response.invalid')), 400);
//        }

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserFromJWT()
    {
        $user =  json_decode(UtilityHelpers::getUserFromJWT());

        return response()->json($user, 200);
    }


    /**
     * Method for requesting reset password
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestResetPassword(Request $request)
    {
        $params = $request->all();

        $validator = Validator::make($params, UserModel::$requestResetPasswordRules);
        if ($validator->fails())
        {
            return response()->json([ 'message' => trans('login.please_send_email') ], 400);
        }

        $user = $this->userHandler->getUserByEmail($params['username']);

        if ($user !== null)
        {
            try {
                $token = md5(uniqid(time(), true));
                $this->userHandler->setResetPasswordToken($token, $user->id);
                $email = [
                    'message' => 'Please follow the link to reset your password: ' . url('/password-recover/' . $token),
                    'from'    => 'zteblade3.dm@gmail.com',
                    'to'      => $params['username'],
                    'subject' => 'Request for password reset.'
                ];
                UtilityHelpers::sendMail($email);

            } catch (\Exception $e)
            {
                return response()->json([ 'message' => trans('response.error') ], 500);
            }
            return response()->json(['message' => trans('login.link_to_change_pass')], 200);
        }
        return response()->json([ 'message' => trans('login.user_not_found') ], 400);
    }

    /**
     * Method for reset password
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        $params = $request->all();

        $validator = Validator::make($params, UserModel::$resetPasswordRules);
        if ($validator->fails())
        {
            return response()->json([ 'message' => trans('response.invalid')], 400);
        }
        if (!$this->userHandler->resetPassword($params))
        {
            return response()->json(['message'=> trans('response.error')], 500);
        }

        return response()->json(['message'=> trans('response.success')], 200);

    }

    /**
     * Non UI route method for checking if user exists with posted email.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmail(Request $request)
    {
        $params = $request->all();
        if (empty($params)||  json_last_error()!= JSON_ERROR_NONE)
        {
            return response()->json(['message'=>trans('response.nodata')], 400);
        }

        if (!$this->userHandler->getUserByEmail($params['email']))
        {
            return response()->json([ 'exist' => false, 'message' => trans('response.email_not_exists') ], 404);
        }

        return response()->json([ 'exist' => true, 'message' => trans('response.email_exists') ], 200);

    }

}
