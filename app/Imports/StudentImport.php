<?php

namespace App\Imports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $subject = Subject::with('student')->whereHas('student', function ($q) {
            $q->where('subject_id', $this->id);
        })->get();
        // dd($subject[0]);
        $data = ['1'];

        foreach ($subject[0]->students as $student) {
            if ($student->id == $row['id']) {
                // return new Subject([
                //     ]);
                $data[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'mark' => $row['mark']

                ];
            }
        }
    }
}
