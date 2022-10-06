<?php

namespace App\Repositories\Users;

interface UserRepositoryInterface
{
    public function getUsers();

    public function getUserById();
}
