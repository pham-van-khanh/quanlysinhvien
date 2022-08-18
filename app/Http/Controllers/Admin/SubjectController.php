<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Faculty;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::select('subjects.*')->orderBy('id','DESC')->Paginate(5);
          return  view('admin.subjects.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.subjects.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        try {
            $data = $request->all();
            $subject = new Subject();
            $subject->name = $data['name'];
            $subject->save();
            session()->flash('success', 'Create Subject Successful');
            return redirect()->back();
        }
        catch (\Exception $err){
            session()->flash('error', 'Create Subject Unsuccessful');
            Log::info($err->getMessage());
            return false;
        }
        return true;
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
        $subject = Subject::find($id);
        return  view('admin.subjects.edit',['subject'=>$subject]);
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
        try{
            $data = request()->all();
            $faculty =  Subject::find($id);
            $faculty->name = $data['name'];
            $faculty->save();
            Session::flash('success', 'Update Faculty Successful');
            return redirect()->route('subjects.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Update Faculty Unsuccessful');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Faculty::findOrFail($id);
        $subject->delete();
        Session::flash('success', 'Delete Subjects Successful');
        return redirect()->route('subjects.index');
    }
}
