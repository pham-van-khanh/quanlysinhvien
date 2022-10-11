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
    protected $_subjectRepository, $_studentRepository;

    public function __construct(SubjectRepositoryInterface $_subjectRepository,
                                StudentRepositoryInterface $_studentRepository)
    {
        $this->subjectRepository = $_subjectRepository;
        $this->studentRepository = $_studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subjectRepository->subjectList();
        $roleAdmin = Config::get('constants.options.roleAdmin');
        $roleStudent = Config::get('constants.options.roleStudent');
        $countSubject = $this->subjectRepository->count();
        if (Auth::user()->roles[0]->name == $roleAdmin) {
            return view('admin.subjects.index', compact('subjects', 'roleAdmin', 'roleStudent', 'countSubject'));
        }
        $student = $this->studentRepository->getStudent();
        $studentSubject = $student->subjects;
        $countStudentSubject = $studentSubject->count();
        $countSubject = $this->subjectRepository->count();
        if (!isset($studentSubject[0])) {
            $countStudentSubject = $studentSubject->count();
            $countSubject = $this->subjectRepository->count();
            $getMark = 1;
            return view('admin.subjects.index', compact('subjects', 'countSubject', 'getMark', 'student', 'roleAdmin', 'countStudentSubject', 'roleStudent'));
        }
        return view('admin.subjects.index', compact('subjects', 'countSubject', 'studentSubject', 'countStudentSubject', 'student', 'roleAdmin', 'roleStudent'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $this->subjectRepository->create($request->all());
        Session::flash('success', 'Create Subject Successful');
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subjects = $this->subjectRepository->find($id);
        return view('admin.subjects.list-student-registed', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->subjectRepository->update($id, $request->all());
        Session::flash('success', 'Update Successful');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = $this->subjectRepository->find($id);
        if ($subject->students()->count('*')) {
            Session::flash('error', 'Cannot Delete Subjects Successful');
            return redirect()->route('subjects.index');
        }
        $subject->delete();
        Session::flash('success', 'Delete Subjects Successful');
        return redirect()->route('subjects.index');
    }

    public function sendMailStudent()
    {
        $subjects = $this->subjectRepository->getAll();
        $students = $this->studentRepository->getStudents();
        $learnedStudentIds = [];

        foreach ($students as $student) {
            if ($student->subjects->count() !== $subjects->count()) {
                $learnedStudentIds[] = $student->id;
            }
        }
        foreach ($learnedStudentIds as $learnedStudentId) {
            $listSubject = [];
            $student = $this->studentRepository->find($learnedStudentId);
            $subject_point = $student->subjects;
            $countMark = $subject_point->count();
            if ($countMark == 0) {
                $listSubject = $subjects;
            } else {
                foreach ($subjects as $sub) {
                    for ($i = 0; $i < $countMark; $i++) {
                        if ($sub->id == $subject_point[$i]->id) {
                            break;
                        } elseif ($i == $countMark - 1) {
                            $listSubject[] = $sub;
                        }
                    }
                }
            }
            $mailable = new SubjectMail($listSubject);
            Mail::to($student->email)->queue($mailable);
        }
        return redirect()->route('students.index')->with('message', 'Successfully');
    }

    public function export($id)
    {
        return Excel::download(new StudentExport($id), 'point-student.xlsx');
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

    public function updateMark(Request $request, $student)
    {
        $student = $this->studentRepository->find($student);
        $students = $student->subjects;
        $countStudent = $students->count();
        for ($i = 0; $i < $countStudent; $i++) {
            if ($request->mark[$i] != 'null') {
                $student->subjects[$i]->pivot
                    ->update([
                        'mark' => $request['mark'][$i]
                    ]);
            }
        }
        Session::flash('success', 'Update Mark For "' . $student->name . '" Successful');
        return redirect()->back();
    }
}
