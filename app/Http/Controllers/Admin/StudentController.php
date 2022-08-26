<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Student;
use App\Repositories\Students\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        return $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepository->getStudents();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = $this->studentRepository->newModel();
        $faculties = Faculty::all();
        return view('admin.students.form', compact('student','faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $imageName = $avatar->hashName();
            $imageName = $request->name . '_' . $imageName;
            $request->avatar = $avatar->storeAs('images/students', $imageName);
        }
        $data = $request->all();
        $data['avatar'] = $request->avatar;
        $data['user_id'] = 1;
        $student = $this->studentRepository->create($data);
        Session::flash('success', 'Create Student Successful');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json([
            'student' => $student,
            'id' => $student->id
        ]);
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
        $data = request()->all();
        $student = Student::find($id);
        $student->save();
        return response()->json($student);
        Session::flash('success', 'Update Faculty Successful');
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
        //
    }
}
