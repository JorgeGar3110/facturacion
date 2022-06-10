<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User;
use App\Admin;

class AdminController extends Controller
{
	use RegistersUsers;
    protected $redirectTo = '/home';

    public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.Administrador.create',compact('datos'));
    }

    public function index() 
    {
        $datos = $this->datos();
        $admin = Admin::join('users', 'users.id' , '=' , 'admins.IdUsuario')->select('admins.*' , 'users.email', 'users.name')->orderBy('admins.id','ASC')->paginate();
        return view('DashAdmin.Administrador.index',compact('datos', 'admin'));
    }

    public function show($id)
    {
        $datos = $this->datos();
        $admin = Admin::join('users', 'users.id' , '=' , 'admins.IdUsuario')->select('admins.*', 'users.email', 'users.name')->where('IdUsuario', '=', $id)->first();
        if ($admin == null) 
        {
            $id = Admin::select('admins.*')->where('admins.id' , '=', $id)->first();
            $admin =  User::join('admins', 'users.id' , '=', 'admins.IdUsuario')->select('users.name', 'users.email', 'admins.id', 'admins.Activo')->where('users.id', '=', $id->IdUsuario)->first();
        }

        if ($admin->Activo == "1") 
        {
            $admin->Activo = "Activo";
        }
        else
        {
            $admin->Activo = "Inactivo";
        }

        return view('DashAdmin.Administrador.show', compact('admin', 'datos'));
    }

    public function edit($id)
    {
        $datos = $this->datos();
        $admin = Admin::select('admins.*')->where('admins.id', '=', $id)->first();
        if ($admin->Activo == "1")
        {
            $est1 = 'Activo';
            $est2 = 'Inactivo';
        }
        else
        {
            $est2 = 'Activo';
            $est1 = 'Inactivo';
        }
        return view('DashAdmin.Administrador.edit', compact('admin', 'datos', 'est1', 'est2'));
    }

    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::find($id);
        $admin->Nombre = $request->Nombre;
        $admin->Paterno = $request->Paterno;
        $admin->Materno = $request->Materno;
        $admin->Activo = $request->Activo;
        $user = User::find($admin->IdUsuario);
        $user->info = '1';
        
        $user->save();
        $admin->save();

        return back()->with('info','Administrador actualizado correctamente');

    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->Activo = '0';
        $user = User::find($admin->IdUsuario);
        $user->activo = '0';
        $user->save();
        $admin->save();
        return back()->with('info','El Administrador ha sido deshabilitado');
    }

    public function activate($id)
    {        
        $admin = Admin::find($id);
        $admin->Activo = '1';
        $user = User::find($admin->IdUsuario);
        $user->activo = '1';
        $user->save();
        $admin->save();
        return back()->with('info','El administrador ha sido activado');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed|max:100',
        ]);
    }

    public function register(UserRequest $request)
    {
        //$this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        $id = User::select('users.id')->where('users.email', '=', $request->email)->first();
        $admin = new Admin;
        $admin->IdUsuario = $id->id;
        $admin->save();
        return back()->with('info','Administrador registrado correctamente');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => '3', 
        ]);
    }


    public function editinfo()
    {
        $datos = $this->datos();
        return view('DashAdmin.formadmininfo',compact('datos'));
    }

    public function updateinfo(AdminRequest $request)
    {
        $id = Auth::user()->id;
        $datos = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        $datos->Nombre = $request->Nombre;
        $datos->Paterno = $request->Paterno;
        $datos->Materno = $request->Materno;
        $admin = Admin::where("IdUsuario", '=' , $id)->update([
                        'Nombre' => $datos->Nombre,
                        'Paterno' => $datos->Paterno,
                        'Materno' => $datos->Materno
                    ]);

        $user = User::where("id", '=' , $id)->update([
                        'info' => "1",
                    ]);
        if (Auth::user()->info == "0") {
            return redirect()->route('Admin')->with('info','Datos actualizados correctamente');
        }
        else
        {
            return back()->with('info','Datos registrados correctamente');
        }
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }
}
