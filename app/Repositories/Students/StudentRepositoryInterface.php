<?php

namespace App\Repositories\Students;

interface StudentRepositoryInterface
{
    public function getStudents();

    public function search($data);
}
