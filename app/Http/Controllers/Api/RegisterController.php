<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repository\Eloquent\UserRepository;
use App\Services\RegisterService;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpStatusCodes;

class RegisterController extends Controller {

    /**
     * Create a new user instance after a valid registration.
     *
     * @param RegisterRequest $request
     * @param RegisterService $registerService
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request, RegisterService $registerService): JsonResponse {
        try {
            $user = $registerService->saveRegistrationDetails($request->validated());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success(
                        $user->createToken(config('app.name'), ['*'])->accessToken,
                        'Registration Success'
        );
    }

}
