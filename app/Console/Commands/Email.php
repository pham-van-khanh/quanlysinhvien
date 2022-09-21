<?php

namespace App\Console\Commands;

use App\Mail\StatusStudentMail;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $students = Student::where('user_id', '!=', 1)->with('subjects')->get();
        $subject = new Subject();
        $listStudentLearned = [];
        $listStudentFullMark = [];
        foreach ($students as $student) {
            if ($student->subjects->count() === $subject->count()) {
                $listStudentLearned[] = $student;
            }
        }
        foreach ($listStudentLearned as $value) {
            for ($i = 0; $i < $subject->count(); $i++) {
                if ($value->subjects[$i]->pivot->mark == null) {
                    break;
                } elseif ($i == $subject->count() - 1) {
                    $listStudentFullMark[] = $value;
                }
            }
        }
        $result = '';
        foreach ($listStudentFullMark as $student) {
            if ($student->subjects->avg('pivot.mark') > 5) {
                $result = 'Are you ok ';
            } else {
                $result = 'No ';
            }
            Mail::to($student->email)->send(new StatusStudentMail($result));
        }
        return 0;
    }
}
