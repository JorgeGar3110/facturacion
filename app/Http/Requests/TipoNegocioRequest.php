<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoNegocioRequest extends FormRequest
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
            'Descripcion'=>'required|string|max:150',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'El :attribute es obligatorio.',
            'Descripcion.required' => 'La :attribute es obligatoria.',
            'Nombre.string' => 'El :attribute es de tipo string.',
            'Descripcion.string' => 'El :attribute es de tipo string.',
            'Nombre.string' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Descripcion.string' => 'La :attribute debe de tener una longitud maxima de 150 caracteres.',
        ];
    }
}
