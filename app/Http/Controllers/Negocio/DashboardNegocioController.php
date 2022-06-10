<?php

namespace App\Http\Controllers\Negocio;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Negocio;

class DashboardNegocioController extends Controller
{
	use AuthenticatesUsers;
	protected $redirectTo = 'negocio';

	public function showDashboardForm()
    {
    	return view('DashNegocio.index');

    }
    
}
