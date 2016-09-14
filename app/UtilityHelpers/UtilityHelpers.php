<?php

namespace App\UtilityHelpers;

use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;


/**
 * Class UtilityHelpers
 * @package App\UtilityHelpers
 */
class UtilityHelpers
{

    /**
     * Method for sending mail.
     *
     * @param array $data
     */
    public static function sendMail($data)
    {
        Mail::raw($data['message'], function ($message) use ($data) {
            $message->to($data['to']);
            $message->from($data['from']);
            $message->subject($data['subject']);
        });
    }

    /**
     * Method for getting user from JWT.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function getUserFromJWT()
    {
        return JWTAuth::parseToken()->toUser();
    }
}