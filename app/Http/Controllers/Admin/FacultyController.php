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
        ->Paginate(7);
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
            Session::flash('success', 'Thêm mới khóa học thành công');
            return redirect()->back();
            }
            catch (\Exception $err){
                Session::flash('error', 'Thêm mới khóa không học thành công');
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
       return view('admin.faculties.edit',['faculty' =>$faculty]);
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
            Session::flash('success', 'Cập nhật khóa học thành công');
            return redirect()->route('faculties.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật khóa học không thành công');
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
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        Session::flash('success', 'Xóa khóa học thành công');
        return redirect()->route('faculties.index');
    }
}
