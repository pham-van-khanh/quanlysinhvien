<?php

namespace App\Repositories;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Set model
     */
    public function newModel()
    {
        return new $this->model;
    }

    public function pluck($key, $value)
    {
        return $this->model->pluck($value, $key);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function relationship($attributes = [])
    {
        return $this->model->with($attributes);
    }

    public function page($number)
    {
        return $this->model->paginate($number);
    }

    public function count()
    {
        return $this->model->count();
    }

}
