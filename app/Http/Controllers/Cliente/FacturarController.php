<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Cliente;
use App\Negocio;
use App\Estado;
use App\TipoNegocio;
use App\UsoCfdi;
use App\Factura;

class FacturarController extends Controller
{
    use AuthenticatesUsers;
	protected $redirectTo = 'Cliente';

    public function showSeleccionarForm()
    {
    	$negocio = Negocio::join('municipios', 'municipios.id', '=', 'negocios.IdMunicipio')->join('estados', 'estados.id','=', 'municipios.IdEstado')->join('tipo_negocios', 'tipo_negocios.id', '=', 'negocios.IdTipoNegocio')->join('users', 'users.id', '=', 'negocios.IdUsuario')->select('negocios.*', 'municipios.Nombre as MunNom', 'estados.Nombre as EstNom', 'tipo_negocios.Nombre as TipNegNom')->where([['negocios.Activo','=', '1'],['users.info', '=', '1'], ['users.activo', '=', '1']])->get();
    	$estados = Estado::select('estados.*')->get();
    	$tneg = TipoNegocio::select('tipo_negocios.*')->where('tipo_negocios.Activo', '=', '1')->get();
    	return view('DashCliente.Facturar.seleccionar',['negocios' => $negocio],compact('estados', 'tneg'));
    }

    public function showConfirmar()
    {
        $datos = $this->datos();
        $IdNegocio = Input::get('id');
        $negocio = Negocio::join('municipios', 'municipios.id', '=', 'negocios.IdMunicipio')->join('estados', 'estados.id', '=' , 'municipios.IdEstado')->select('negocios.*', 'municipios.Nombre as Municipio', 'estados.Nombre as Estado')->where('negocios.id' , '=', $IdNegocio)->first();
        $uso = UsoCfdi::select('uso_cfdis.*')->get();
        if ($negocio->Activo == '1') {
            return view('DashCliente.Facturar.confirmar', compact('datos', 'negocio', 'IdNegocio', 'uso'));
        }
        else
        {
            return back()->with('info','El negocio que selecciono no esta disponible para emitir facturas');
        }
    }

    public function facturar(Request $request, $id)
    {   
        $IdCliente = Cliente::select('clientes.id')->where('clientes.IdUsuario', '=', Auth::user()->id)->first();
        $factura = new Factura();
        $factura->IdCliente = $IdCliente->id;
        $factura->IdNegocio = $id;
        $factura->FechaSolicitud = date('Y-m-d H:i:s');
        $factura->Cuerpo = 'Compra';
        $factura->Firma = 'Firma';
        $factura->FechaFirma = date('Y-m-d H:i:s');
        $factura->IdEstatus = '1';
        $factura->IdUso = $request->IdUso;
        $factura->Activo = '1';
        $factura->save(); 
        return redirect()->route('Cliente/VerHistorial')->with('info','Factura generada correctamente');
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Cliente::where("IdUsuario", '=' , $id)->select('clientes.*')->first();
        return $dat;
    }
}
