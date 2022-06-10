<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipoNegocioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User; 
use App\Admin;
use App\TipoNegocio;

class TipoNegocioController extends Controller
{
	use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

	public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.TipoNegocio.create',compact('datos'));
    }

    public function store(TipoNegocioRequest $request)
    {
    	$tnegocio = new TipoNegocio;
    	$tnegocio->Nombre = $request->Nombre;
    	$tnegocio->Descripcion = $request->Descripcion;
        $tnegocio->Activo = $request->Activo;
    	$tnegocio->save();
    	return back()->with('info','Tipo de negocio registrado correctamente');
    }

    public function index()
    {
        $datos = $this->datos();
        $tnegocio = TipoNegocio::select('tipo_negocios.*')->orderBy('tipo_negocios.id','ASC')->paginate();
        return view('DashAdmin.TipoNegocio.index',compact('datos', 'tnegocio'));
    }

    public function show($id)
    {
        $datos = $this->datos();
        $tnegocio = TipoNegocio::select('tipo_negocios.*')->where('id', '=', $id)->first();
        if ($tnegocio->Activo == "1") 
        {
            $tnegocio->Activo = "Activo";
        }
        else
        {
            $tnegocio->Activo = "Inactivo";
        }
        return view('DashAdmin.TipoNegocio.show', compact('tnegocio', 'datos'));
    }

    public function edit($id)
    {
        $datos = $this->datos();
        $tnegocio = TipoNegocio::select('tipo_negocios.*')->where('id', '=', $id)->first();
        return view('DashAdmin.TipoNegocio.edit', compact('tnegocio', 'datos'));
    }

    public function update(TipoNegocioRequest $request, $id)
    {
        $tnegocio = TipoNegocio::find($id);
        $tnegocio->Nombre = $request->Nombre;
        $tnegocio->Descripcion = $request->Descripcion;
        $tnegocio->Activo = $request->Activo;
        $tnegocio->save();
        return back()->with('info','Tipo de negocio actualizado correctamente');

    }

    public function delete($id)
    {  
        $tnegocio = TipoNegocio::find($id);
        $tnegocio->Activo = '0';
        $tnegocio->save();
        return back()->with('info','El ipo de negocio ha sido deshabilitado');
    }

    public function activate($id)
    {  
        $tnegocio = TipoNegocio::find($id);
        $tnegocio->Activo = '1';
        $tnegocio->save();
        return back()->with('info','El tipo de negocio ha sido activado');
    }


    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }
}
