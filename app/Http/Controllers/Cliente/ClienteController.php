<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\Estatus;
use App\Estado;
use App\TipoUsuario;
use App\Municipio;
use App\User;
use App\Cliente;
use App\Negocio;
use App\TipoNegocio;
use App\Factura;

class ClienteController extends Controller
{
    public function edit()
    {
        $datos = $this->datos();
        $estados = Estado::select('estados.*')->orderBy('estados.id','ASC')->get();
        $estatus = Estatus::select('estatuses.*')->where('estatuses.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $tuser = TipoUsuario::select('tipo_usuarios.*')->where('tipo_usuarios.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $idest = Municipio::select('municipios.IdEstado')->where('municipios.id' , '=', $datos->IdMunicipio)->first();
        if ($idest == "") {
            $idest = new Municipio;
            $idest->IdEstado = '1';
        }
        if ($datos->IdTipoUsuario == "") {;
            $datos->IdTipoUsuario = "1";
        }
        if ($datos->IdEstatus == "") {;
            $datos->IdEstatus = "1";
        }
        return view('DashCliente.formclienteinfo',compact('datos', 'estados', 'estatus', 'tuser', 'idest'));
    }

    public function update(ClienteRequest $request)
    {
        $id = Auth::user()->id;
        $datos = Cliente::where("IdUsuario", '=' , $id)->select('clientes.*')->first();
        $datos->Nombre = $request->Nombre;
        $datos->Paterno = $request->Paterno;
        $datos->Materno = $request->Materno;
        $datos->RFC = $request->RFC;
        $datos->IdMunicipio = $request->IdMunicipio;
        $datos->IdTipoUsuario = $request->IdTipoUsuario;
        $datos->Calle = $request->Calle;
        $datos->Numero = $request->Numero;
        $datos->Colonia = $request->Colonia;
        $datos->CP = $request->CP;
        $datos->Referencias = $request->Referencias;
        $datos->Telefono = $request->Telefono;

        $admin = Cliente::where("IdUsuario", '=' , $id)->update([
                        'Nombre' => $datos->Nombre,
                        'Paterno' => $datos->Paterno,
                        'Materno' => $datos->Materno,
                        'RFC' => $datos->RFC,
                        'IdMunicipio' => $datos->IdMunicipio,
                        'IdTipoUsuario' => $datos->IdTipoUsuario,
                        'Calle' => $datos->Calle,
                        'Numero' => $datos->Numero,
                        'Colonia' => $datos->Colonia,
                        'CP' => $datos->CP,
                        'Referencias' => $datos->Referencias,
                        'Telefono' => $datos->Telefono,
                    ]);

        $user = User::where("id", '=' , $id)->update([
                        'info' => "1",
                    ]); 
        if (Auth::user()->info == "0") {
            return redirect()->route('Cliente')->with('info','Datos actualizados correctamente, ya puede solicitar facturas desde el menu lateral');
        }
        else
        {
            return back()->with('info','Datos actualizados correctamente');
        }
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Cliente::where("IdUsuario", '=' , $id)->select('clientes.*')->first();
        return $dat;
    }

    public function showHistorialForm()
    {
        $datos = $this->datos();
        $id = Cliente::select('clientes.id')->where('clientes.IdUsuario', '=', Auth::user()->id)->first();
        $factura = Factura::join('negocios', 'negocios.id', '=', 'facturas.IdNegocio')->join('uso_cfdis', 'uso_cfdis.id', '=', 'facturas.IdUso')->select('facturas.*', 'uso_cfdis.Nombre as Uso', 'negocios.Nombre')->where('facturas.IdCliente', '=', $id->id)->get();
        return view('DashCliente.Historial.Verfactura', compact('datos', 'factura'));
    }
}
