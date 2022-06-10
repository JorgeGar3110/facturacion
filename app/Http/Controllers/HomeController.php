<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo == '1')
        {
            if(Auth::user()->info == '1')
            {
                return redirect()->route('Cliente');
            }
            else
            {
                //RUTA PARA FORMULARIO DE ACTUALIZACION DE DATOS
                return redirect()->route('Cliente/MisDatos')->with('warning','Ingrese sus datos antes de realizar alguna otra acción');
            }
        }

        if(Auth::user()->tipo == '2')
        {
            return redirect()->route('Negocio');
        }

        if(Auth::user()->tipo == '3')
        {
            if(Auth::user()->info == '1')
            {
                return redirect()->route('Admin');
            }
            else
            {
                //RUTA PARA FORMULARIO DE ACTUALIZACION DE DATOS
                return redirect()->route('Admin/MisDatos')->with('warning','Ingrese sus datos antes de realizar alguna otra acción');
            }
        }
    }
}
