<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambioPasswordRequest extends FormRequest
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
            'ContraActual' => 'required|string|max:100|min:6',
            'password' => 'required|string|max:100|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'ContraActual.required' => 'La contraseña actual es obligatoria.',
            'ContraActual.string' => 'La contraseña actual es de tipo string.',
            'ContraActual.max' => 'La contraseña actual debe de tener una longitud maxima de 100 caracteres.',
            'ContraActual.min' => 'La contraseña actualEl :attribute debe de tener una longitud minima de 6 caracteres.',
            'password.required' => 'La nueva contraseña es obligatoria.',
            'password.string' => 'La nueva contraseña es de tipo string.',
            'password.max' => 'La nueva contraseña debe de tener una longitud maxima de 100 caracteres.',
            'password.min' => 'La nueva contraseña debe de tener una longitud minima de 6 caracteres.',
            'password.confirmed' => 'La nueva contraseña no coincide con la confirmación.',
        ];
    }
}
