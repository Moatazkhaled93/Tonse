<?php

namespace App\Services;

use App\Repository\Eloquent\UserRepository;

class UserService {

    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function all() {

        return $this->userRepository->all();
    }
    public function get($id) {

        return $this->userRepository->find($id);
    }

    public function create($data) {

        return $this->userRepository->create($data);
    }

    public function update($id, $data) {

        return $this->userRepository->update($data ,$id);
    }
    public function friendship($data) {
        $user = $this->userRepository->find($data['from']);
        $user->user()->attach($data['to']);
        
        return $user;
    }
    public function sendMessages($data) {
        $user = $this->userRepository->find($data['from']);
        $user->message()->attach($data['to'],['text' => $data['text']]);
        
        return $user;
    }
    public function delete($id) {

        return $this->userRepository->delete($id);
    }

}
