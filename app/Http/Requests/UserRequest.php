<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
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
        if(Auth::check())
        {
            return [
                'name' => array('required','string','max:50','regex:/^([A-Z|0-9|a-z])*$/'),
                'email' => 'required|string|email|max:100|unique:users,email,'.Auth::user()->id.',id',
            ];
        }
        else
        {
            return [
                'name' => array('required','string','max:50','regex:/^([A-Z|0-9|a-z])*$/'),
                'email' => 'required|string|email|max:100|unique:users,email,',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.regex' => 'El nickname solo acepta letras y numeros sin espacios.',
            'name.required' => 'El nickname es obligatorio.',
            'email.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El nickname es de tipo string.',
            'email.email' => 'El :attribute es de tipo email.',
            'name.max' => 'El nickname debe de tener una longitud maxima de 50 caracteres.',
            'email.max' => 'El :attribute debe de tener una longitud maxima de 100 caracteres.',
            'email.unique' => 'El :attribute ingresado ya esta registrado en el sistema.',

        ];
    }
}
