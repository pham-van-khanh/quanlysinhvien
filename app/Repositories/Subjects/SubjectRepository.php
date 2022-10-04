<?php

namespace App\Repositories\Subjects;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class SubjectRepository extends BaseRepository implements
    SubjectRepositoryInterface
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

    public function subjectList()
    {
        $studentPage = 13;
        $adminPage = 9;
        $roleStudent = Auth::user()->roles[0]->name == 'student';
        $subjects = $this->model->select('id', 'name', 'updated_at', 'created_at')
            ->orderBy('updated_at', 'DESC');
        if ($roleStudent) {
            return $subjects->Paginate($studentPage);
        } else {
            return $subjects->Paginate($adminPage);
        }
    }
}
