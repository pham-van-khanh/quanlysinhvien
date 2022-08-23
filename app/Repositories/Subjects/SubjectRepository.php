<?php

namespace App\Repositories\Subjects;

use App\Repositories\BaseRepository;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return \App\Models\Subject::class;
    }

    /**
     * @return mixed
     */
    public function getSubjects()
    {
        return $this->model->select('id', 'name', 'updated_at', 'created_at')
            ->orderBy('updated_at', 'DESC')->paginate(2);
    }
}
