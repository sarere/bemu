<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\helpers;

class LoginController extends Controller
{
	public function index(){
		if(session()->has('my_name')){
			return redirect('p3dk');
		}
		return view('login');
	}

    public function store(Request $request){
		$host = 'ukdw.ac.id';
		if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
			$output = helpers::login('http://ukdw.ac.id/id/home/do_login','id='.$request->nim.'&password='.$request->password);
			if($output){
				$request->session()->put('my_name',$request->nim);
				return redirect('p3dk');
			}else{
				return redirect('login')->with('error','NIM atau Password Salah!');
			}
		fclose($socket);
		} else {
			return redirect('login')->with('error','Server error!');
		}

    	
    }

    public function destroy(){
		 session()->forget('my_name');
		 return redirect('/');
	}

	public function doLogin(){
		$output = helpers::login('http://ukdw.ac.id/id/home/do_login','id='.$request->nim.'&password='.$request->password);
		if($output){
			$request->session()->put('my_name',$request->nim);
			return redirect('p3dk');
		}else{
			return redirect('login')->with('error','NIM atau Password Salah!');
		}
	}
}
