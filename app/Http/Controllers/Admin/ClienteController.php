<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\User;
use App\Cliente;
use App\Admin;
use App\Estado;
use App\Municipio;
use App\Estatus;
use App\TipoUsuario;


class ClienteController extends Controller
{
  	use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

    public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.Cliente.create',compact('datos'));
    }

    public function index()
    {
        $datos = $this->datos();
        $cliente = Cliente::join('users', 'users.id' , '=' , 'clientes.IdUsuario')->select('clientes.*' , 'users.email', 'users.name')->orderBy('clientes.id','ASC')->paginate();
        return view('DashAdmin.Cliente.index',compact('datos', 'cliente'));
    }
    public function show($id)
    {
        $datos = $this->datos();
        $cliente= Cliente::join('users', 'users.id' , '=' , 'clientes.IdUsuario')->join('tipo_usuarios', 'tipo_usuarios.id', '=' , 'clientes.IdTipoUsuario')->join('estatuses' , 'estatuses.id' , '=' , 'clientes.IdEstatus')->select('clientes.*', 'users.email', 'users.name' , 'tipo_usuarios.Nombre as Tu', 'estatuses.Nombre as estatusn')->where('clientes.id', '=', $id)->first();
        if ($cliente == null)
        {
            $cliente= Cliente::join('users', 'users.id' , '=' , 'clientes.IdUsuario')->join('tipo_usuarios', 'tipo_usuarios.id', '=' , 'clientes.IdTipoUsuario')->select('clientes.*', 'users.email', 'users.name' , 'tipo_usuarios.Nombre as Tu')->where('clientes.id', '=', $id)->first();
            if ($cliente == null)
            { 
                $id = Cliente::select('clientes.*')->where('clientes.id' , '=', $id)->first();
                $cliente =  User::join('clientes', 'users.id' , '=', 'clientes.IdUsuario')->select('users.name', 'users.email', 'clientes.id', 'clientes.Activo')->where('users.id', '=', $id->IdUsuario)->first();
            }
        }


        if ($cliente->Activo == "1") 
        {
            $cliente->Activo = "Activo";
        }
        else
        {
            $cliente->Activo = "Inactivo";
        }

        return view('DashAdmin.Cliente.show', compact('cliente', 'datos'));
    }

    public function edit($id)
    {
        $datos = $this->datos();
        $cliente = Cliente::select('clientes.*')->where('clientes.id', '=', $id)->first();
        $estados = Estado::select('estados.*')->orderBy('estados.id','ASC')->get();
        $estatus = Estatus::select('estatuses.*')->where('estatuses.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $tuser = TipoUsuario::select('tipo_usuarios.*')->where('tipo_usuarios.Activo', '=' ,'1')->orderBy('Nombre')->get();
        $idest = Municipio::select('municipios.IdEstado')->where('municipios.id' , '=', $cliente->IdMunicipio)->first();
        if ($idest == "") {
            $idest = new Municipio;
            $idest->IdEstado = '1';
        }
        if ($cliente->IdTipoUsuario == "") {;
            $cliente->IdTipoUsuario = "1";
        }
        if ($cliente->IdEstatus == "") {;
            $cliente->IdEstatus = "1";
        }
        return view('DashAdmin.Cliente.edit', compact('cliente', 'datos', 'estados', 'estatus', 'tuser', 'idest'));
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->Nombre = $request->Nombre;
        $cliente->Paterno = $request->Paterno;
        $cliente->Materno = $request->Materno;
        $cliente->RFC = $request->RFC;
        $cliente->IdTipoUsuario = $request->IdTipoUsuario;
        $cliente->IdMunicipio = $request->IdMunicipio;
        $cliente->Calle = $request->Calle;
        $cliente->Numero = $request->Numero;
        $cliente->Colonia = $request->Colonia;
        $cliente->CP = $request->CP;
        $cliente->Referencias = $request->Referencias;
        $cliente->Telefono = $request->Telefono;
        $cliente->IdEstatus = $request->IdEstatus;
        $cliente->Activo = $request->Activo;
        $cliente->save();
        return back()->with('info','Cliente actualizado correctamente');

    }

    public function delete($id)
    {
        $cliente = Cliente::find($id);
        $cliente->Activo = '0';
        $user = User::find($cliente->IdUsuario);
        $user->activo = '0';
        $user->save();
        $cliente->save();
        return back()->with('info','El cliente ha sido deshabilitado');
    }

    public function activate($id)
    {
        $cliente = Cliente::find($id);
        $cliente->Activo = '1';
        $user = User::find($cliente->IdUsuario);
        $user->activo = '1';
        $user->save();
        $cliente->save();
        return back()->with('info','El cliente ha sido activado');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register(UserRequest $request)
    {
        //$this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        $id = User::select('users.id')->where('users.email', '=', $request->email)->first();
        $cliente = new Cliente;
        $cliente->IdUsuario = $id->id;
        $cliente->save();
        return back()->with('info','Cliente registrado correctamente');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => '1',
        ]);
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
