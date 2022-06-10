<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'Paterno'=>'required|string|max:100',
            'Materno'=>'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'El :attribute es obligatorio.',
            'Paterno.required' => 'El :attribute es obligatorio.',
            'Materno.required' => 'El :attribute es obligatorio.',
            'Nombre.string' => 'El :attribute es obligatorio.',
            'Paterno.string' => 'El :attribute es de tipo string.',
            'Materno.string' => 'El :attribute es de tipo string.',
            'Nombre.max' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Paterno.max' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Materno.max' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
        ];
    }
}
