<?php

namespace App\Repository\Interfaces;

interface EloquentRepositoryInterface {

    public function all($columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);



}
