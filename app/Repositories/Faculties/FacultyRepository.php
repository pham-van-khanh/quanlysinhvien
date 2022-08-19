<?php

namespace App\Repositories\Faculties;

use App\Models\Faculty;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class   FacultyRepository extends BaseRepository implements FacultyRepositoryInterface
{


    /**
     * @return mixed
     */
    public function getModel()
    {
        return \App\Models\Faculty::class;
    }

    /**
     * @return mixed
     */
    public function getFuclty()
    {
        return $this->model->select('id','name')->take(5)->get();
    }
}
