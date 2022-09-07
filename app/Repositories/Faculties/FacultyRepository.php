<?php

namespace App\Repositories\Faculties;

use App\Repositories\BaseRepository;

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
    public function facultyList()
    {
        return $this->model->select('id', 'name', 'updated_at', 'created_at')
            ->orderBy('updated_at', 'DESC')->paginate(4);
    }
}
