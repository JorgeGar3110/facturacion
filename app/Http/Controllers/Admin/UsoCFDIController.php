<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UsoCFDIRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User;
use App\Admin;
use App\UsoCfdi;

class UsoCFDIController extends Controller
{
  	use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

    public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.UsoCFDI.create',compact('datos'));
    }

    public function index()
    {
        $datos = $this->datos();
        $cfdi = UsoCfdi::select('uso_cfdis.*')->orderBy('uso_cfdis.id','ASC')->paginate();
        return view('DashAdmin.UsoCFDI.index',compact('datos', 'cfdi'));
    }

    public function show($id)
    {
        $datos = $this->datos();
        $cfdi = UsoCfdi::select('uso_cfdis.*')->where('id', '=', $id)->first();
        if ($cfdi->Activo == "1") 
        {
            $cfdi->Activo = "Activo";
        }
        else
        {
            $cfdi->Activo = "Inactivo";
        }
        return view('DashAdmin.UsoCFDI.show', compact('cfdi', 'datos'));
    }

    public function edit($id)
    {
        $datos = $this->datos();
        $cfdi = UsoCfdi::select('uso_cfdis.*')->where('id', '=', $id)->first();
        if ($cfdi->Activo == "1")
        {
            $est1 = 'Activo';
            $est2 = 'Inactivo';
        }
        else
        {
            $est2 = 'Activo';
            $est1 = 'Inactivo';
        }
        return view('DashAdmin.UsoCFDI.edit', compact('cfdi', 'datos', 'est1', 'est2'));
    }

    public function update(UsoCFDIRequest $request, $id)
    {
        $cfdi = UsoCFDI::find($id);
        $cfdi->Nombre = $request->Nombre;
        $cfdi->Clave = $request->Clave;
        $cfdi->Activo = $request->Activo;
        $cfdi->save();
        return back()->with('info','Uso CFDI actualizado correctamente');
    }

    public function delete($id)
    {  
        $cfdi = UsoCFDI::find($id);
        $cfdi->Activo = '0';
        $cfdi->save();
        return back()->with('info','El uso de CFDI ha sido deshabilitado');
    }

    public function activate($id)
    {  
        $cfdi = UsoCFDI::find($id);
        $cfdi->Activo = '1';
        $cfdi->save();
        return back()->with('info','El uso de CFDI ha sido activado');
    }

    public function store(UsoCFDIRequest $request)
    {
    	$cfdi = new UsoCfdi;
    	$cfdi->Nombre = $request->Nombre;
    	$cfdi->Clave = $request->Clave;
    	if ($request->Activo == "Activo")
    	{
    		$cfdi->Activo = '1';
    	}
    	else
    	{
    		if ($request->Activo == "Inactivo") 
    		{
    			$cfdi->Activo = '0';
    		}
    	}
    	$cfdi->save();
    	return back()->with('info','Uso de CFDI registrado correctamente');
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }

}
