<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Student;
use App\Repositories\Subjects\SubjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subjectRepository->subjectList()->Paginate(5);
        if (Auth::user()->roles[0]->name == 'admin') {
            return view('admin.subjects.index', compact('subjects'));
        }
        $student = Student::where('user_id', Auth::id())->first();
        $studentSubject = $student->subjects;

        if (!isset($studentSubject[0])) {
            $getMark = 1;
            return view('admin.subjects.index', compact('subjects', 'getMark', 'student'));
        }
        return view('admin.subjects.index', compact('subjects', 'studentSubject', 'student'));
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
        }
        $this->subjectRepository->delete($id);
        Session::flash('success', 'Delete Subjects Successful');
        return redirect()->route('subjects.index');
    }
}
