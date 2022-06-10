<?php

namespace App\Http\Controllers\Sesion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Sesion;

class SesionController extends Controller
{
    public funtion regsesion()
    {
    	$ses = new Sesion;
    	$ses->IdUsuario = Auth::user()->id;
    	$ses->Fecha = date('Y-m-d H:i:s');
    	$ses->Activo = '1';
    	$ses->save();
    }
}
