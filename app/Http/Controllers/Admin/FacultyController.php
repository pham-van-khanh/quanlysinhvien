<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $faculties = Faculty::select('faculties.*')
        ->orderBy('id','DESC')
        ->Paginate(5);
     return view('admin.faculties.index',['faculties'=>$faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        try {
            $data = request()->all();
            $faculty = new Faculty();
            $faculty->name = $data['name'];
            $faculty->save();
            Session::flash('success', 'Create Faculty Successful');
            return redirect()->back();
            }
            catch (\Exception $err){
                Session::flash('error', 'Create Faculty Unsuccessful');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return response()->json([
            'faculty' => $faculty,
            'id' => $faculty->id
        ]);
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
        try{
            $data = request()->all();
            $faculty =  Faculty::find($id);
            $faculty->name = $data['name'];
            $faculty->save();
            return response()->json($faculty);
            Session::flash('success', 'Update Faculty Successful');
            return redirect()->route('faculties.index');
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
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        Session::flash('success', 'Delete Faculty Successful');
        return redirect()->route('faculties.index');
    }
}
