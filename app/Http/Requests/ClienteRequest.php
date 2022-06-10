<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'RFC'=>'required|string|max:13',
            'Calle'=>'required|string|max:100',
            'Numero'=>'required|numeric|digits_between:1,10',
            'Colonia'=>'required|string|max:100',
            'CP'=>'required|numeric|digits_between:5,5',
            'Telefono'=>'required|numeric|digits_between:10,10',
            'IdMunicipio'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'El campo :attribute es obligatorio.',
            'Paterno.required' => 'El campo :attribute es obligatorio.',
            'Materno.required' => 'El campo :attribute es obligatorio.',
            'RFC.required' => 'El campo RFC es obligatorio.',
            'Calle.required' => 'El campo :attribute es obligatorio.',
            'Numero.required' => 'El campo :attribute es obligatorio.',
            'Colonia.required' => 'El campo :attribute es obligatorio.',
            'CP.required' => 'El campo CP es obligatorio.',
            'Telefono.required' => 'El campo :attribute es obligatorio.',

            'Nombre.string' => 'El campo :attribute es de tipo string.',
            'Paterno.string' => 'El campo :attribute es de tipo string.',
            'Materno.string' => 'El campo :attribute es de tipo string.',
            'RFC.string' => 'El campo RFC es obligatorio.',
            'Calle.string' => 'El campo :attribute es de tipo string.',
            'Numero.numeric' => 'El campo :attribute es de tipo numerico de 1 a 10 digitos.',
            'Colonia.string' => 'El campo :attribute es obligatorio.',
            'CP.numeric' => 'El campo CP es de tipo numerico.',
            'Telefono.numeric' => 'El campo :attribute es de tipo numerico de 10 digitos incluyendo la lada.',

            'Nombre.max' => 'El campo :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Paterno.max' => 'El campo :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Materno.max' => 'El campo :attribute debe de tener una longitud maxima de 100 caracteres.',
            'RFC.max' => 'El campo RFC debe de tener una longitud maxima de 13 caracteres.',
            'Calle.max' => 'El campo :attribute debe de tener una longitud maxima de 100 caracteres.',
            'Colonia.max' => 'El campo :attribute debe de tener una longitud maxima de 100 caracteres.',
            'CP.digits_between' => 'El campo CP debe de tener una longitud de 5 digitos.',
            'Telefono.digits_between' => 'El campo :attribute debe de tener una longitud de 10 caracteres incluyendo la lada.',
            'Numero.digits_between' => 'El campo :attribute es de tipo numerico con 1 a 10 digitos..'
        ];
    }
}
