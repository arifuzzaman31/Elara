<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use App\admin;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function dashboard()
    {
    	return view('admin.admin_content');
    } 

    public function loginCheck(Request $request)
    {

    	$credentials = [
                'email'    => $request->admin_email,
                'password' => $request->admin_password
            ];
        if(Auth::guard('admin-auth')->attempt($credentials)){
            Session::flash('msg','Successfull !');
            Session::put('admin',Auth::guard('admin-auth')->user());
            return redirect('dashboard');
        }
        Session::flash('msg','Wrong Credentials !');
        return redirect('admin');

    }
}
