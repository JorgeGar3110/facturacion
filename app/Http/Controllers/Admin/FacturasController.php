<?php

namespace App\Http\Controllers\Admin;

Use Illuminate\Http\Request;
Use App\Http\Controllers\Controller;
Use App\Factura;
Use App\UsoCfdi;
Use App\Negocio;
Use App\Admin;
Use Auth;


class FacturasController extends Controller
{
	public function showTodasFacturas()
	{
        $factura = Factura::join('negocios', 'negocios.id', '=', 'facturas.IdNegocio')->join('uso_cfdis', 'uso_cfdis.id', '=', 'facturas.IdUso')->select('facturas.*', 'uso_cfdis.Nombre as Uso', 'negocios.Nombre')->get();
        return view('DashAdmin.Facturas.index', compact('factura'));
	}

	public function showFacturasNegocio($id)
	{
		$negocio = Negocio::find($id);
        $factura = Factura::join('negocios', 'negocios.id', '=', 'facturas.IdNegocio')->join('uso_cfdis', 'uso_cfdis.id', '=', 'facturas.IdUso')->select('facturas.*', 'uso_cfdis.Nombre as Uso', 'negocios.Nombre')->where('negocios.id', '=', $id)->get();
        return view('DashAdmin.Facturas.Negocio.index', compact('factura', 'negocio'));
	}


	public function showNegocios()
	{
		$datos = $this->datos();
        $negocio = Negocio::select('negocios.*')->orderBy('negocios.id','ASC')->get();
        return view('DashAdmin.Facturas.Negocio.negocios',compact('negocio', 'datos'));
	}

	public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }

}
