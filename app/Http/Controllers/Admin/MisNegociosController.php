<?php

namespace App\Http\Controllers\Admin;

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
use App\Admin;
use App\TipoNegocio;
use App\Estado;
use App\Municipio;
use App\Estatus;


class MisNegociosController extends Controller
{
	use RegistersUsers;
    protected $redirectTo = '/home';

    public function index($id)
    {
        $datos = $this->datos();
        $user = $this->datosuser($id);
        $negocio = Negocio::select('negocios.*')->where('negocios.IdUsuario', '=', $id)->orderBy('negocios.id','ASC')->get();
        return view('DashAdmin.Negocio.MisNegocios.index',compact('user','negocio', 'datos'));
    }
    public function create($id)
    {
    	$datos = $this->datos();
    	$user = $this->datosuser($id);
    	$estados = Estado::select('estados.*')->orderBy('estados.id','ASC')->get();
        $estatus = Estatus::select('estatuses.*')->where('estatuses.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $tneg = TipoNegocio::select('tipo_negocios.*')->where('tipo_negocios.Activo', '=' ,'1')->orderBy('Nombre')->get();
        return view('DashAdmin.Negocio.MisNegocios.create', compact('user','datos', 'estados', 'estatus', 'tneg'));
    }

    public function store(NegocioRequest $request, $id)
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
        $negocio->IdEstatus = $request->IdEstatus;
        $negocio->Activo = $request->Activo;
        $negocio->IdUsuario = $id;
        $negocio->save();
        return redirect()->route('Admin/Negocio/MisNegocios/', $id)->with('info','El negocio fue agregado correctamente al usuario');

    }
    public function show($id,$id2)
    {
        $datos = $this->datos();
        $negocio = Negocio::join('users', 'users.id' , '=' , 'negocios.IdUsuario')->join('tipo_negocios', 'tipo_negocios.id', '=' , 'negocios.IdTipoNegocio')->join('estatuses', 'estatuses.id', '=', 'negocios.IdEstatus')->select('negocios.*', 'users.email', 'users.name', 'tipo_negocios.Nombre as Tn', 'estatuses.Nombre as estatusn')->where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->first();
        if ($negocio == Null) {
            $negocio= Negocio::join('users', 'users.id' , '=' , 'negocios.IdUsuario')->join('tipo_negocios', 'tipo_negocios.id', '=' , 'negocios.IdTipoNegocio')->select('negocios.*', 'users.email', 'users.name', 'tipo_negocios.Nombre as Tn')->where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->first(); 
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
        return view('DashAdmin.Negocio.MisNegocios.show', compact('negocio', 'datos', 'lugar'));
    }

    public function edit($id, $id2)
    {
        $datos = $this->datos();
        $negocio = Negocio::select('negocios.*')->where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->first();
        $estados = Estado::select('estados.*')->orderBy('estados.id','ASC')->get();
        $estatus = Estatus::select('estatuses.*')->where('estatuses.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $tneg = TipoNegocio::select('tipo_negocios.*')->where('tipo_negocios.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $idest = Municipio::select('municipios.IdEstado')->where('municipios.id' , '=', $negocio->IdMunicipio)->first();
        if ($idest == "") {
            $idest = new Municipio;
            $idest->IdEstado = '1';
        }
        if ($negocio->IdTipoUsuario == "") {;
            $negocio->IdTipoUsuario = "1";
        }
        if ($negocio->IdEstatus == "") {;
            $negocio->IdEstatus = "1";
        }
        return view('DashAdmin.Negocio.MisNegocios.edit', compact('negocio', 'datos', 'estados', 'estatus', 'tneg', 'idest'));
    }

    public function update(NegocioRequest $request, $id, $id2)
    {
        $negocio2 = Negocio::where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->first();
        $negocio2->Nombre = $request->Nombre;
        $negocio2->RazonSocial = $request->RazonSocial;
        $negocio2->RFC = $request->RFC;
        $negocio2->IdTipoNegocio = $request->IdTipoNegocio;
        $negocio2->IdMunicipio = $request->IdMunicipio;
        $negocio2->Calle = $request->Calle;
        $negocio2->Numero = $request->Numero;
        $negocio2->Colonia = $request->Colonia;
        $negocio2->CP = $request->CP;
        $negocio2->Referencias = $request->Referencias;
        $negocio2->Telefono = $request->Telefono;
        $negocio2->IdEstatus = $request->IdEstatus;
        $negocio2->Activo = $request->Activo;

        $negocio = Negocio::where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->update([
                'Nombre' => $negocio2->Nombre,
                'RazonSocial' => $negocio2->RazonSocial,
                'RFC' => $negocio2->RFC,
                'IdTipoNegocio' => $negocio2->IdTipoNegocio,
                'IdMunicipio' => $negocio2->IdMunicipio,
                'Calle' => $negocio2->Calle,
                'Numero' => $negocio2->Numero,
                'Colonia' => $negocio2->Colonia,
                'CP' => $negocio2->CP,
                'Referencias' => $negocio2->Referencias,
                'Telefono' => $negocio2->Telefono,
                'IdEstatus' => $negocio2->IdEstatus,
                'Activo' => $negocio2->Activo
            ]);

        return back()->with('info','Negocio actualizado correctamente');

    }

    public function delete($id, $id2)
    {
    	$negocio2 = Negocio::where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->first();
        $negocio2->Activo = '0';
        $negocio = Negocio::where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->update([
                'Activo' => $negocio2->Activo
            ]);
        return back()->with('info','El negocio ha sido deshabilitado');
    }

    public function activate($id, $id2)
    {
        $negocio2 = Negocio::where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->first();
        $negocio2->Activo = '1';
        $negocio = Negocio::where([['negocios.IdUsuario', '=', $id],['negocios.id', '=', $id2]])->update([
                'Activo' => $negocio2->Activo
            ]);
        return back()->with('info','El negocio ha sido activado');
    }
    

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }

    public function datosuser($id)
    {
    	$dat = User::select('users.id','users.name', 'users.email')->where('users.id', '=', $id)->first();
        return $dat;
    }
}
