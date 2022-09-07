<?php

namespace App\Repositories\Students;

use App\Models\Student;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

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
            ->withTrashed()
            ->orderBy('updated_at', 'DESC')->paginate(4);
    }

    public function search($data)
    {
        $student = $this->model->newQuery();

        if (isset($data['age_from'])) {
            $student->whereYear('birthday', '<=', Carbon::now()->subYear($data['age_from'])->format('Y'));
        }

        if (isset($data['age_to'])) {
            $student->whereYear('birthday', '>=', Carbon::now()->subYear($data['age_to'])->format('Y'));
        }
        return $student->withTrashed()->paginate(2);
    }
}
