<?php

namespace App\Services;

use App\Exceptions\UserNotFoundException;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Auth;

class LoginService
{


    public function authenticateUser(array $userData)
    {
        if (!Auth::guard('web')->attempt($userData)) {
            throw new UserNotFoundException('The username or password is incorrect', HttpStatusCodes::HTTP_UNAUTHORIZED);
        }

        $user = Auth::guard('web')->getLastAttempted();

        return $user->createToken('Laravel Password Grant Client')->accessToken;;
    }
}
