<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\Repositories\Faculties\FacultyRepositoryInterface;
use App\Repositories\Students\StudentRepositoryInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class FacultyController extends Controller
{
    protected $_facultyRepository, $_studentRepository;

    public function __construct(FacultyRepositoryInterface $_facultyRepository,
                                StudentRepositoryInterface $_studentRepository)
    {
        $this->facultyRepository = $_facultyRepository;
        $this->studentRepository = $_studentRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Config::get('constants.options.roleStudent');
        $faculties = $this->facultyRepository->facultyList();
        $studentId = $this->studentRepository->getStudent();
        if (empty($studentId)) {
            return view('admin.faculties.index', compact('faculties', 'student'));
        }
        return view('admin.faculties.index', compact('faculties', 'student', 'studentId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty = $this->facultyRepository->newModel();
        return view('admin.faculties.form', compact('faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        $this->facultyRepository->create($request->all());
        Session::flash('success', 'Create Faculty Successful');
        return redirect()->route('faculties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = $this->facultyRepository->find($id);
        return view('admin.faculties.form', compact('faculty'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(FacultyRequest $request, $id)
    {
        $this->facultyRepository->update($id, $request->all());
        Session::flash('success', 'Update Successful');
        return redirect()->route('faculties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = $this->facultyRepository->find($id);
        if ($faculty->student->count()) {
            Session::flash('error', 'Cannot Delete Faculty Successful');
            return redirect()->route('faculties.index');
        }
        $faculty->delete();
        Session::flash('success', 'Delete Faculty Successful');
        return redirect()->route('faculties.index');
    }
}
