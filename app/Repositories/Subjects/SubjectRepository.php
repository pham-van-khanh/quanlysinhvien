<?php

namespace App\Repositories\Subjects;

use App\Models\Faculty;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
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
    public function getStudent()
    {
        // TODO: Implement getStudent() method.
    }
}
