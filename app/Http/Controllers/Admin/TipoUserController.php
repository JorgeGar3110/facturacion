<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TipoUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User; 
use App\Admin;
use App\TipoUsuario;

class TipoUserController extends Controller
{
	use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

    public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.TipoUser.create',compact('datos'));
    }

    public function store(TipoUserRequest $request)
    {
    	$tuser = new TipoUsuario;
    	$tuser->Nombre = $request->Nombre;
    	$tuser->Descripcion = $request->Descripcion;
        $tuser->Activo = $request->Activo;
    	$tuser->save();
    	return back()->with('info','Tipo de usuario registrado correctamente');
    }

    public function index()
    {
        $datos = $this->datos();
        $tuser = TipoUsuario::select('tipo_usuarios.*')->orderBy('tipo_usuarios.id','ASC')->paginate();
        return view('DashAdmin.TipoUser.index',compact('datos', 'tuser'));
    }

    public function show($id)
    {
        $datos = $this->datos();
        $tuser = TipoUsuario::select('tipo_usuarios.*')->where('id', '=', $id)->first();
        if ($tuser->Activo == "1") 
        {
            $tuser->Activo = "Activo";
        }
        else
        {
            $tuser->Activo = "Inactivo";
        }
        return view('DashAdmin.TipoUser.show', compact('tuser', 'datos'));
    }

    public function edit($id)
    {
        $datos = $this->datos();
        $tuser = TipoUsuario::select('tipo_usuarios.*')->where('id', '=', $id)->first();
        if ($tuser->Activo == "1")
        {
            $est1 = 'Activo';
            $est2 = 'Inactivo';
        }
        else
        {
            $est2 = 'Activo';
            $est1 = 'Inactivo';
        }
        return view('DashAdmin.TipoUser.edit', compact('tuser', 'datos', 'est1', 'est2'));
    }

    public function update(TipoUserRequest $request, $id)
    {
        $tuser = TipoUsuario::find($id);
        $tuser->Nombre = $request->Nombre;
        $tuser->Descripcion = $request->Descripcion;
        $tuser->Activo = $request->Activo;
        $tuser->save();
        return back()->with('info','Tipo de usuario actualizado correctamente');

    }

    public function delete($id)
    {  
        $tuser = TipoUsuario::find($id);
        $tuser->Activo = '0';
        $tuser->save();
        return back()->with('info','Tipo de usuario ha sido deshabilitado');
    }

    public function activate($id)
    {  
        $tuser = TipoUsuario::find($id);
        $tuser->Activo = '1';
        $tuser->save();
        return back()->with('info','Tipo de usuario ha sido activado');
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }
}
