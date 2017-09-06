<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\helpers;

class LoginController extends Controller
{
	public function index(){
		return view('login');
	}

    public function store(Request $request){
    	$output = helpers::login('http://ukdw.ac.id/id/home/do_login','id='.$request->nim.'&password='.$request->password);
    	$request->session()->put('my_name',$request->nim);
    	return redirect('p3dk');
    }

    public function destroy(){
		 session()->forget('my_name');
		 return redirect('/');
	}
}
