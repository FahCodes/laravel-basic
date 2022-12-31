<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtracurricularCreateRequest extends FormRequest
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
            'name' => 'max:50|required',
        ];
    }
    
    public function messages()
    {
        return[
            'name.required' => 'Silahkan isi Eksul anda',
            'name.max' => 'Ekskul tidak boleh lebih dari :max karakter'
        ];
    }
}
