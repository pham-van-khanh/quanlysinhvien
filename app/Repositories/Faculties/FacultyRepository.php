<?php

namespace App\Repositories\Faculties;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class   FacultyRepository extends BaseRepository implements
    FacultyRepositoryInterface
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
        $studentPage = 8;
        $adminPage = 10;
        $roleStudent = Auth::user()->roles[0]->name == 'student';
        $faculties = $this->model->select('id', 'name', 'updated_at', 'created_at')
            ->orderBy('updated_at', 'DESC');
        if ($roleStudent) {
            return $faculties->Paginate($studentPage);
        } else {
            return $faculties->Paginate($adminPage);
        }
    }
}
