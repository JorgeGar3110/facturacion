<?php

namespace App\Http\Controllers\Negocio;

use Illuminate\Http\Request;
use App\Http\Requests\CambioPasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Negocio;
use App\User;

class CambioPasswordController extends Controller
{
	public function edit()
    {
        $datos = $this->datos();
        return view('DashNegocio.CambioContra.password',compact('datos'));
    }

    public function update(CambioPasswordRequest $request)
    {
    	if(Hash::check($request->ContraActual, Auth::user()->password))
    	{
    		$cambio = User::find(Auth::user()->id);
    		$cambio->password = Hash::make($request->password);
    		$cambio->save();
    		return back()->with('info','Contraseña actualizada correctamente');
    	}
    	else
    	{
    		return back()->with('warning','La Contraseña actual ingresada no coincide con la de nuestros registros, No se ha actualizado la contraseña.');
    	}
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Negocio::where("IdUsuario", '=' , $id)->select('negocios.*')->first();
        return $dat;
    }
}
