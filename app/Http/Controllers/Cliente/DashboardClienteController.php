<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use App\Cliente;

class DashboardClienteController extends Controller
{
	use AuthenticatesUsers;
	protected $redirectTo = 'Cliente';

    public function showDashboardForm()
    {
    	$datos = $this->datos();
    	return view('DashCliente.index',compact('datos'));
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Cliente::where("IdUsuario", '=' , $id)->select('clientes.*')->first();
        return $dat;
    }
}
