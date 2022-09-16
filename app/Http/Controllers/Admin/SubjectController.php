<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Imports\StudentImport;
use App\Mail\SubjectMail;
use App\Models\Student;
use App\Repositories\Students\StudentRepositoryInterface;
use App\Repositories\Subjects\SubjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    protected $subjectRepository, $studentRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository,
                                StudentRepositoryInterface $studentRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subjectRepository->subjectList()->Paginate(5);
        $admin = Config::get('constants.options.roleAdmin');
        $roleStudent = Config::get('constants.options.roleStudent');

        if (Auth::user()->roles[0]->name == $admin) {
            return view('admin.subjects.index', compact('subjects', 'admin', 'roleStudent'));
        }
        $student = Student::where('user_id', Auth::id())->first();
        $studentSubject = $student->subjects;

        if (!isset($studentSubject[0])) {
            $getMark = 1;
            return view('admin.subjects.index', compact('subjects', 'getMark', 'student', 'admin', 'roleStudent'));
        }
        return view('admin.subjects.index', compact('subjects', 'studentSubject', 'student', 'admin', 'roleStudent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = $this->subjectRepository->newModel();
        return view('admin.subjects.form', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $data = $request->all();
        $data = $this->subjectRepository->create($data);
        Session::flash('success', 'Create Subject Successful');
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //handle show student learned this subject
        $subjects = $this->subjectRepository->find($id);
        return view('admin.subjects.list-student-registed', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = $this->subjectRepository->find($id);
        return view('admin.subjects.form', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $subject = $this->subjectRepository->update($id, $data);
        Session::flash('success', 'Update Successful');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = $this->subjectRepository->find($id);
        if ($subject->students()->count('*')) {
            Session::flash('error', 'Cannot Delete Subjects Successful');
            return redirect()->route('subjects.index');
        }
        $this->subjectRepository->delete($id);
        Session::flash('success', 'Delete Subjects Successful');
        return redirect()->route('subjects.index');
    }

    public function mail_subjects_all()
    {
        $subjects = $this->subjectRepository->subjectList();
        $students = $this->studentRepository->getStudents();
        foreach ($students as $student) {
            if ($student->subjects->count() !== $subjects->count()) {
                $getStudentLearned[] = $student->id;
            }
        }
        foreach ($getStudentLearned as $value) {
            $listSubject = [];
            $student = $this->studentRepository->find($value);
            $subject_point = $student->subjects;
            if ($subject_point->count() == 0) {
                $listSubject = $subjects;
            } else {
                foreach ($subjects as $sub) {
                    for ($i = 0; $i < $subject_point->count(); $i++) {
                        if ($sub->id == $subject_point[$i]->id) {
                            break;
                        } elseif ($i == $subject_point->count() - 1) {
                            $listSubject[] = $sub;
                        }
                    }
                }
            }
            $mailable = new SubjectMail($listSubject);
            Mail::to($student->email)->send($mailable);
        }
        return redirect()->route('students.index')->with('message', 'Successfully');
    }

    public function export($id)
    {
        return Excel::download(new StudentExport($id), 'point-student.xlsx');
//        return Excel::store(new StudentExport, 'point-student.xlsx', 'disk-name');
    }

    public function import(Request $request, $id)
    {
        $subject = $this->subjectRepository->relationship(['students'])->find($id);
        $fileImport = Excel::toCollection(new StudentImport($id), request()->file('import_file'));
        foreach ($fileImport[0] as $import) {
            foreach ($subject->students as $student) {
                if ($import['id'] == $student['id']) {
                    $student->pivot->where('student_id', '=', $student['id'])->where('subject_id', $id)->update([
                        'mark' => $import['mark'],
                    ]);
                }
            }
        }
        Session::flash('success', 'Subject Imported Successfully');
        return redirect()->back();
    }
}
