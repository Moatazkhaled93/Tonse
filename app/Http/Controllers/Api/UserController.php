<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpStatusCodes;

class UserController extends Controller {

    /**
     * get All .
     * @param UserService $userService
     * @return JsonResponse
     */
    public function index(UserService $userService) {
        try {
            $users = $userService->all();
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($users, 'get users successfully');
    }

    /**
     * get by one .
     * @param UserService $userService
     * @return JsonResponse
     */
    public function show($id, UserService $userService) {
        try {
            $user = $userService->get($id);
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($user, 'get user successfully');
    }


    /**
     * update .
     * @param UserService $userService
     * @return JsonResponse
     */
    public function update($id, UserRequest $request, UserService $userService) {
        try {
            $user = $userService->update($id, $request->validated());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($user, 'updated user successfully');
    }
    /**
     * friendship .
     * @param UserService $userService
     * @return JsonResponse
     */
    public function friendship(Request $request, UserService $userService) {
        try {
            $user = $userService->friendship($request->all());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($user, 'Friendship  successfully');
    }
    /**
     * sendMessages .
     * @param UserService $userService
     * @return JsonResponse
     */
    public function sendMessages(Request $request, UserService $userService) {
        try {
            $user = $userService->sendMessages($request->all());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($user, 'send Messages  successfully');
    }

    /**
     * delete .
     * @param UserService $userService
     * @return JsonResponse
     */
    public function destroy($id, UserService $userService) {
        try {
            $userService->delete($id);
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success('', 'deleted user successfully');
    }

}
