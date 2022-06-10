<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
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


class NegociosController extends Controller
{
	use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

    public function showRegistrationForm()
    {
        $datos = $this->datos();
        return view('DashAdmin.Negocio.create',compact('datos'));
    }

    public function index()
    {
        $datos = $this->datos();
        $usersn = User::select('users.id','users.name', 'users.email', 'users.activo')->where('users.tipo', '=', '2')->get();
        return view('DashAdmin.Negocio.index',compact('usersn', 'datos'));
    }

    public function show($id)
    {
    }

    public function delete($id)
    {
        $negocio = User::find($id);
        $negocio->activo = '0';
        $negocio->save();
        return back()->with('info','El cliente ha sido deshabilitado');
    }

    public function activate($id)
    {
        $negocio = User::find($id);
        $negocio->activo = '1';
        $negocio->save();
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
        $user = User::find($id->id);
        $user->info = '1';
        $user->save();
        return redirect()->route('Admin/Negocio/MisNegocios/', $id->id)->with('info','El cliente fue registrado correctamente, Desde aqui podra agregar negocios al cliente');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => '2',
        ]);
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }
}
