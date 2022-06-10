<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Admin;

class DashboardAdminController extends Controller
{
	use AuthenticatesUsers;
	protected $redirectTo = 'Admin';

	public function showDashboardForm()
    {
    	$datos = $this->datos();
    	return view('DashAdmin.index',compact('datos'));
    }

    public function datos()
    {
        $id = Auth::user()->id;
        $dat = Admin::where("IdUsuario", '=' , $id)->select('admins.*')->first();
        return $dat;
    }
}