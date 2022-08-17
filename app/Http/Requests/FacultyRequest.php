<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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
        return [
            'name'=>'required|unique:faculties,name',
        ];
    }
    public function messages(Type $var = null)
    {
        return [
            'name.required'=> 'Tên khóa học không được để trống',
            'name.unique' =>'Tên khóa học này đã được sử dụng',
        ];
    }
}
