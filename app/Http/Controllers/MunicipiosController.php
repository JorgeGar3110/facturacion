<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Estado;
use App\Municipio;
use Response;

class MunicipiosController extends Controller
{
	public function getmunicipios()
    {
        $id = Input::get('id');
        $municipio = Municipio::select('municipios.*')->where('municipios.IdEstado' , '=', $id)->get();
        return Response::json($municipio);
    }

    public function getmunicipios2()
    {
        $nom = Input::get('id');
        $municipio = Municipio::join('estados', 'estados.id', '=', 'municipios.IdEstado')->select('municipios.*')->where('estados.Nombre' , '=', $nom)->get();
        return Response::json($municipio);
    }
}
