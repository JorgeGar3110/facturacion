<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Sesion;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Login.login');
    }

    public function authenticated()
    {
        $ses = new Sesion;
        $ses->IdUsuario = Auth::user()->id;
        $ses->Fecha = date('Y-m-d H:i:s');
        $ses->Activo = '1';
        $ses->save();
        
        if (Auth::user()->activo == '1')
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
        else
        {
            Auth::logout();
            return redirect()->route('login')->with('warning','El usuario que ha sido ingresado se encuentra deshabilitado. Porfavor contacte al administrador.');
        }
    }
}
