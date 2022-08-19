<?php

namespace App\Repositories\Faculties;

use App\Repositories\EloquentRepositoryInterface;

interface FacultyRepositoryInterface extends EloquentRepositoryInterface
{

    public function getFuclty();
}
