<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'max:5|required',
            'teacher_id' => 'required'
        ];
    }

    public function attributes()
    {
        return[
            'teacher_id' => 'teacher',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Silahkan isi kelas',
            'name.max' => 'Kelas tidak boleh lebih dari :max karakter',
            'teacher_id.required' => 'Silahkan pilih guru'
        ];
    }
}
