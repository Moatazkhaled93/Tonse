<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\OAuth2Exception;
use App\Exceptions\UserNotFoundException;
use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller {
    /**
     * Login API
     *
     * @param LoginRequest $request
     * @param LoginService $loginService
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request, LoginService $loginService): JsonResponse {

        try {
            $token = $loginService->authenticateUser($request->validated());
            return $this->response->success($token, 'login successfully', HttpStatusCodes::HTTP_OK);
        } catch (UserNotFoundException $userNotFoundException) {
            return $this->response->error($userNotFoundException->getMessage(), $userNotFoundException->getCode());
        } catch (OAuth2Exception $OAuth2Exception) {
            return response()->json(
                            [
                                'status' => 'error',
                                'error_code' => $OAuth2Exception->getCode(),
                                'message' => $OAuth2Exception->getMessage()
                            ],
                            $OAuth2Exception->getCode()
            );
        }
    }

}
