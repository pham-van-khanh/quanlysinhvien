<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use App\Repositories\Faculties\FacultyRepositoryInterface;
use Illuminate\Support\Facades\Session;

class FacultyController extends Controller
{

    protected FacultyRepositoryInterface $facultyRepository;

    public function __construct(FacultyRepositoryInterface $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty = new Faculty();
        return view('admin.faculties.form', compact('faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        $data = $request->all();
        $data = $this->facultyRepository->create($data);
        Session::flash('success', 'Create Faculty Successful');
        return redirect()->route('faculties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $faculty = $this->facultyRepository->find($id);
        return view('admin.faculties.form', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(FacultyRequest $request, $id)
    {
        $data = $request->all();
        $faculty = $this->facultyRepository->update($id, $data);
        Session::flash('success', 'Update Faculty Successful');
        return redirect()->route('faculties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->facultyRepository->delete($id);
        Session::flash('success', 'Delete Faculty Successful');
        return redirect()->route('faculties.index');
    }
}
