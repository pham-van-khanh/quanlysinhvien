<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('mark');
    }

//    public function student()
//    {
//        return $this->belongsToMany('Student', 'student_subject', 'subject_id', 'student_id')
//            ->selectRaw('students.*, sum(project_part.count) as pivot_count')
//            ->withTimestamps()
//            ->groupBy('project_part.pivot_part_id');
//    }
}
