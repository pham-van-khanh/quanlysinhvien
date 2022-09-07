<?php

namespace App\Http\Controllers;

use App\Jobs\HandleMail;
use App\Mail\Mail;
use App\Mail\SendMail;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        return $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->userRepository->getUsers()->paginate(8);
        return view('admin.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->userRepository->newModel();
        $roles = Role::pluck('name', 'name')->all();
        $faculty = Faculty::pluck('name', 'id')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.users.form', compact('roles', 'user', 'userRole', 'faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make('1');

        $user = $this->userRepository->create($input);
        $user->assignRole('student');
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $user->assignRole('student');
        $student['user_id'] = $user->id;
        $student['name'] = $user->name;
        $student['email'] = $user->email;
        $student['faculty_id'] = $request['faculty_id'];
        $student['avatar'] = 'images/students/Phạm Văn Khánh_JdMc32K3rC3BY92G5tl86dNwgMN31UzOVMZsSBUG.jpg';
        $student['phone'] = 1;
        $student['birthday'] = $dt->toDateString();
        $student['gender'] = 1;
        $student['address'] = 1;
        $student['password'] = 123;
        $students = Student::create($student);
        $mailable = new SendMail($user);
        \Illuminate\Support\Facades\Mail::to($user->email)->send($mailable);
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.users.form', compact('user', 'roles', 'userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,

        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = $this->userRepository->update($id, $input);
//        $user->update($input);
//        DB::table('model_has_roles')->where('model_id', $id)->delete();
//        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::where('user_id', '=', $id)->get();
        dd($students);
        $studentId = $students->pluck('id');
        Student::whereIn('id', $studentId)->update(['user_id' => 0]);
        $this->userRepository->delete($id);
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
