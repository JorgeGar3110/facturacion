<?php

namespace App\Http\Controllers\Negocio;

use Illuminate\Http\Request;
use App\Http\Requests\NegocioRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User;
use App\Negocio;
use App\Estado;
use App\Estatus;
use App\TipoNegocio;
use App\Municipio;
use App\Factura;
use App\Cliente;

class NegocioController extends Controller
{
    public function index()
    {
        $user = $this->datos();
        $negocio = Negocio::select('negocios.*')->where([['negocios.IdUsuario', '=', Auth::user()->id], ['negocios.Activo', '=', '1']])->orderBy('negocios.id','ASC')->get();
        return view('DashNegocio.MisNegocios.index',compact('user','negocio'));
    }

    public function create()
    {
        $user = $this->datos();
        $estados = Estado::select('estados.*')->orderBy('estados.id','ASC')->get();
        $estatus = Estatus::select('estatuses.*')->where('estatuses.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $tneg = TipoNegocio::select('tipo_negocios.*')->where('tipo_negocios.Activo', '=' ,'1')->orderBy('Nombre')->get();
        return view('DashNegocio.MisNegocios.create', compact('user','estados', 'estatus', 'tneg'));
    }

    public function store(NegocioRequest $request)
    {
        $negocio = new Negocio;
        $negocio->Nombre = $request->Nombre;
        $negocio->RazonSocial = $request->RazonSocial;
        $negocio->RFC = $request->RFC;
        $negocio->IdTipoNegocio = $request->IdTipoNegocio;
        $negocio->IdMunicipio = $request->IdMunicipio;
        $negocio->Calle = $request->Calle;
        $negocio->Numero = $request->Numero;
        $negocio->Colonia = $request->Colonia;
        $negocio->CP = $request->CP;
        $negocio->Referencias = $request->Referencias;
        $negocio->Telefono = $request->Telefono;
        //$negocio->Estatus = "1";
        $negocio->Activo = "1";
        $negocio->IdUsuario = Auth::user()->id;
        $negocio->save();
        return back()->with('info','El negocio fue registrado correctamente');
    }

    public function show($id)
    {
        $user = $this->datos();
        $negocio= Negocio::join('users', 'users.id' , '=' , 'negocios.IdUsuario')->join('tipo_negocios', 'tipo_negocios.id', '=' , 'negocios.IdTipoNegocio')->join('estatuses', 'estatuses.id', '=', 'negocios.IdEstatus')->select('negocios.*', 'users.email', 'users.name', 'tipo_negocios.Nombre as Tn', 'estatuses.Nombre as estatusn')->where('negocios.id', '=', $id)->first();
        if ($negocio == Null) {
            $negocio= Negocio::join('users', 'users.id' , '=' , 'negocios.IdUsuario')->join('tipo_negocios', 'tipo_negocios.id', '=' , 'negocios.IdTipoNegocio')->select('negocios.*', 'users.email', 'users.name', 'tipo_negocios.Nombre as Tn')->where('negocios.id', '=', $id)->first();
        }
        if ($negocio->Activo == "1") 
        {
            $negocio->Activo = "Activo";
        }
        else
        {
            $negocio->Activo = "Inactivo";
        }
        $lugar = Municipio::join('estados', 'estados.id' , '=', 'municipios.IdEstado')->where('municipios.id', '=', $negocio->IdMunicipio)->select('municipios.Nombre as Municipio', 'estados.Nombre as Estado')->first();
        return view('DashNegocio.MisNegocios.show', compact('negocio', 'user', 'lugar'));
    }

    public function edit($id)
    {
        $user = $this->datos();
        $negocio = Negocio::select('negocios.*')->where('negocios.id', '=', $id)->first();
        $estados = Estado::select('estados.*')->orderBy('estados.id','ASC')->get();
        $tneg = TipoNegocio::select('tipo_negocios.*')->where('tipo_negocios.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $idest = Municipio::select('municipios.IdEstado')->where('municipios.id' , '=', $negocio->IdMunicipio)->first();
        if ($idest == "") {
            $idest = new Municipio;
            $idest->IdEstado = '1';
        }
        return view('DashNegocio.MisNegocios.edit', compact('negocio', 'user', 'estados', 'tneg', 'idest'));
    }

    public function update(NegocioRequest $request, $id)
    {
        $negocio = Negocio::find($id);
        $negocio->Nombre = $request->Nombre;
        $negocio->RazonSocial = $request->RazonSocial;
        $negocio->RFC = $request->RFC;
        $negocio->IdTipoNegocio = $request->IdTipoNegocio;
        $negocio->IdMunicipio = $request->IdMunicipio;
        $negocio->Calle = $request->Calle;
        $negocio->Numero = $request->Numero;
        $negocio->Colonia = $request->Colonia;
        $negocio->CP = $request->CP;
        $negocio->Referencias = $request->Referencias;
        $negocio->Telefono = $request->Telefono;
        $negocio->save();
        return back()->with('info','Negocio actualizado correctamente');
    }

    public function delete($id)
    {
        $negocio = Negocio::find($id);
        $negocio->Activo = '0';
        $negocio->save();
        return back()->with('info','El negocio ha sido borrado');
    }

    public function showIndexFacturasExpForm()
    {
    	$user = $this->datos();
        $negocio = Negocio::select('negocios.*')->where([['negocios.IdUsuario', '=', Auth::user()->id], ['negocios.Activo', '=', '1']])->orderBy('negocios.id','ASC')->get();
        return view('DashNegocio.FacturasExpedidas.index',compact('user','negocio'));	
    }

    public function showFacturasExpForm($id)
    {
        $datos = $this->datos();
        $factura = Factura::join('clientes', 'clientes.id', '=', 'facturas.IdCliente')->join('uso_cfdis', 'uso_cfdis.id', '=', 'facturas.IdUso')->select('facturas.*', 'uso_cfdis.Nombre as Uso', 'clientes.*')->where('facturas.IdNegocio', '=', $id)->get();
        $negocio =  Negocio::find($id);
        return view('DashNegocio.FacturasExpedidas.FactExp', compact('datos', 'factura', 'negocio'));
    }

    public function showIndexMisClientesForm()
    {
    	$user = $this->datos();
        $negocio = Negocio::select('negocios.*')->where([['negocios.IdUsuario', '=', Auth::user()->id], ['negocios.Activo', '=', '1']])->orderBy('negocios.id','ASC')->get();
        return view('DashNegocio.MisClientes.index',compact('user','negocio'));	
    }

    public function showMisClientesForm($id)
    {
        $datos = $this->datos();
        $cliente = Cliente::join('facturas', 'facturas.IdCliente', '=', 'clientes.id')->join('users', 'users.id', '=', 'clientes.IdUsuario')->join('municipios', 'municipios.id', '=' ,'clientes.IdMunicipio')->join('estados', 'estados.id', '=', 'municipios.IdEstado')->select('clientes.*', 'users.email as Correo', 'municipios.Nombre as Ciudad', 'estados.Nombre as Estado')->where('facturas.IdNegocio', '=', $id)->distinct('IdCliente')->get();
        $negocio =  Negocio::find($id);
        return view('DashNegocio.MisClientes.clientes', compact('datos', 'cliente', 'negocio'));
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = User::where("id", '=' , $id)->select('users.*')->first();
        return $dat;
    } 
}
