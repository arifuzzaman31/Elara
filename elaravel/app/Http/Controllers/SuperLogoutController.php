<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Auth;

class SuperLogoutController extends Controller
{
    public function logout()
    {	
    	Session::forget('admin');
    	Auth::guard('admin-auth')->logout();
    	return redirect::to('/admin');
    }
}
