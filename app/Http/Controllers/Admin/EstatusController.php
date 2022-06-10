<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EstatusRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User; 
use App\Admin;
use App\Estatus; 

class EstatusController extends Controller
{
	use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

    public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.Estatus.create',compact('datos'));
    }

    public function store(EstatusRequest $request)
    {
    	$estatus = new Estatus;
    	$estatus->Nombre = $request->Nombre;
        $estatus->Activo = $request->Activo;
    	$estatus->save();
    	return back()->with('info','Estatus registrado correctamente');
    }

    public function index()
    {
        $datos = $this->datos();
        $estatus = Estatus::select('estatuses.*')->orderBy('estatuses.id','ASC')->paginate();
        return view('DashAdmin.Estatus.index',compact('datos', 'estatus'));
    }

    public function show($id)
    {
        $datos = $this->datos();
        $estatus = Estatus::select('estatuses.*')->where('id', '=', $id)->first();
        if ($estatus->Activo == "1") 
        {
            $estatus->Activo = "Activo";
        }
        else
        {
            $estatus->Activo = "Inactivo";
        }
        return view('DashAdmin.Estatus.show', compact('estatus', 'datos'));
    }

    public function edit($id)
    {
        $datos = $this->datos();
        $estatus = Estatus::select('estatuses.*')->where('id', '=', $id)->first();
        
        return view('DashAdmin.Estatus.edit', compact('estatus', 'datos'));
    }

    public function update(EstatusRequest $request, $id)
    {
        $estatus = Estatus::find($id);
        $estatus->Nombre = $request->Nombre;
        $estatus->Activo = $request->Activo;
        $estatus->save();
        return back()->with('info','Estatus actualizado correctamente');

    }

    public function delete($id)
    {  
        $estatus = Estatus::find($id);
        $estatus->Activo = '0';
        $estatus->save();
        return back()->with('info','El estatus ha sido deshabilitado');
    }

    public function activate($id)
    {  
        $estatus = Estatus::find($id);
        $estatus->Activo = '1';
        $estatus->save();
        return back()->with('info','El estatus ha sido activado');
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }
}
