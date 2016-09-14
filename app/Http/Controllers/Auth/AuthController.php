<?php

namespace App\Http\Controllers\Auth;

use App\Models\AuthModel;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Method for authenticating user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->all();
        if (empty($credentials)) {
            return response()->json(array('message' => trans('auth.empty')), 400);
        }
        $valid = Validator::make($credentials, AuthModel::$validationRules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('auth.invalid')), 400);
        }

        try {
            $user = UserRepository::getUser($credentials);

            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json(['message' => trans('auth.invalid_credentials')], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'auth.could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }
}
