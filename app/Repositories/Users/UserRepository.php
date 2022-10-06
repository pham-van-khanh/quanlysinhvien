<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements
    UserRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->model->orderBy('updated_at', 'DESC')->where('id', '!=', 1);
    }

    public function getUserById()
    {
        return $this->model->orderBy('updated_at', 'DESC')->where('id', '!=', 1);
    }
}
