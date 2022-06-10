<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsoCFDIRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre'=>'required|string|max:100',
            'Clave'=>'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'El :attribute es obligatorio.',
            'Clave.required' => 'El :attribute es obligatorio.',
            'Nombre.string' => 'El :attribute es de tipo string.',
            'Clave.string' => 'El :attribute es de tipo string.',
            'Nombre.string' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Clave.string' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
        ];
    }
}
