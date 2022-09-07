<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->route('student')) {
            return [
                'name' => 'required|regex:/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u' . $this->route('student'),
                'email' => 'required|min:10|unique:students,email' . $this->route('student'),
                'user_id' => 'min:1|max:1000000|unique:students,user_id' . $this->route('student'),
                'phone' => 'required|min:10|max:12|unique:students,phone' . $this->route('student'),
                'birthday' => 'required|min:6|max:80' . $this->route('student'),
                'faculty_id' => 'required|min:1|max:1000000' . $this->route('student'),
                'address' => 'required|min:6|max:80' . $this->route('student'),
                'code' => 'required|min:5|max:5|unique:students,code' . $this->route('student'),
                'gender' => 'required' . $this->route('student'),
            ];
        }
        return [
            'name' => 'required|regex:/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u',
            'email' => 'required|min:10|unique:students,email',
            'avatar' => 'image',
            'user_id' => 'min:1|max:1000000|unique:students,user_id',
            'phone' => 'required|min:10|max:12|unique:students,phone',
            'birthday' => 'required|min:6|max:80',
            'faculty_id' => 'min:1|max:1000000',
            'address' => 'required|min:6|max:80',
            'code' => 'min:5|max:5|unique:students,code',
            'gender' => 'required'
        ];
    }
}
