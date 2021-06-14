<?php

namespace App\Services;

use App\Repository\Eloquent\UserRepository;


class RegisterService {

    private $userRepository;


    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;

    }

    public function saveRegistrationDetails(array $data) {
        
        return $this->userRepository->create($data);;
    }



}
