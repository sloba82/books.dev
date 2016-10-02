<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class PermissionControl
{

    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        $user = $this->getAuthenticatedUser();

        if ($user['active'] != 1)
        {
            return response()->json(['message' => trans('user.not_active_user')], 400);
        }

        if (isset($user->role) ){
            return $next($request);
        }

        return response($user->content(), $user->getStatusCode());
    }

    /**
     * Method for getting authenticated user from JWT.
     *
     * @return \Illuminate\Http\JsonResponse|null
     */
    protected function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate())
            {
                return response()->json(['message' => trans('user.user_not_found')], 404);
            }
        }
        catch (TokenExpiredException $e)
        {
            return response()->json(['message' => trans('user.token_expired')], $e->getStatusCode());
        }
        catch (TokenInvalidException $e)
        {
            return response()->json(['message' => trans('user.token_invalid')], $e->getStatusCode());
        }
        catch (JWTException $e)
        {
            return response()->json(['message' => trans('user.token_absent')], $e->getStatusCode());
        }
        return JWTAuth::parseToken()->toUser();
    }

}