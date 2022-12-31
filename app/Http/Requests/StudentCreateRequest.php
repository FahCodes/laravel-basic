<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nis' => 'unique:students|max:8|required',
            'name' => 'max:50|required',
            'gender' => 'required',
            'class_id' => 'required'
        ];
    }

    //Mengubah sebutan eror vvalidasi
    public function attributes()
    {
        return [
            'class_id' => 'class',
        ];
    }

    public function messages()
    {   
        return[
            'nis.required' => 'Silahkan Isi Nis Anda',
            'nis.max' => 'NIS Tidak boleh lebih dari :max',
            'name.required' => 'Silahkan isi Username',
            'name.max' => 'Nama Tidak boleh lebih dari :max',
            'gender.required' => 'Silahkan Isi Gender Anda',
            'class_id.required' => 'Silahkan Isi Class Anda'
        ];
    }
}
