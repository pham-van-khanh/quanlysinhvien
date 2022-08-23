<?php

namespace App\Repositories\Students;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Student::class;
    }

    public function getStudents()
    {
        return $this->model
            ->select('id', 'name', 'faculty_id', 'email', 'avatar', 'birthday', 'phone', 'created_at', 'updated_at')
            ->with('faculty')
            ->orderBy('updated_at', 'DESC')->paginate(2);
    }
}
