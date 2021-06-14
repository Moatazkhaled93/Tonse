<?php

namespace App\Repository\Eloquent;

use App\Factories\ModelFactory;
use App\Repository\Interfaces\EloquentRepositoryInterface;

abstract class EloquentRepository implements EloquentRepositoryInterface {

    protected $model;
    protected $modelFactory;

    public function __construct(ModelFactory $modelFactory) {
        $this->modelFactory = $modelFactory;
        $this->setModel();
    }

    public function all($columns = ['*']) {
        return $this->model->get($columns);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function find($id, $columns = ['*']) {
        return $this->model->find($id, $columns);
    }

    public function update(array $data, $id, $attribute = "id") {
        return $this->model->find($id)->update($data);
    }

    public function delete($id) {
        return $this->model->destroy($id);
    }

    private function setModel() {
        $this->model = $this->modelFactory->create($this->getModelName());
    }

    public function getModel() {
        return $this->model;
    }

}
