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

    public function subjectList(){
        return $this->model->with('student');
    }
}
