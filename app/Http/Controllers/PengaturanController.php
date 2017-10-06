<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	// Session::forget('message');	
    	$user = DB::table('users')
            ->where('id', Auth::user()->id);            
        return view('user.pengaturanprivasi',['user' => $user]);
    }

    public function profil(){
    	// Session::forget('message');
    	$user = DB::table('users')
            ->where('id', Auth::user()->id);
    	return view('user.pengaturanprofil',['user' => $user]);
       
    }

    public function privasi(){
    	return  view('user.pengaturanprivasi');
        
    }

    public function update(Request $request){
    	DB::table('users')
	        ->where('id', Auth::user()->id)
	        ->update([
	          'name' => $request->name,
	          'nickname' => $request->nickname,
	          'fb' => $request->fb,
	          'twitter' => $request->twitter,
	          'website' => $request->website,
	          'line' => $request->line
	          ]);
    	return redirect()->back()
                ->with('message', 'Profil Telah Diperbaharui')
                ->with('status', 'success');
    }

    public function changePassword(Request $request){
    	$user = DB::table('users')
            ->where('id', Auth::user()->id);
    	$oldPassword = $user->value('password');
    	if(Hash::check($request->oldPassword,$oldPassword)){
	    	$hashedRandomPassword = Hash::make($request->newPassword);
	    	DB::table('users')
		        ->where('id', Auth::user()->id)
		        ->update([
		          'password' => $hashedRandomPassword
		          ]);

		    return redirect()->back()
                ->with('message', 'Password Telah Diubah')
                ->with('status', 'success');
		} else{
			return redirect()->back()
                ->with('message', 'Password Lama Salah')
                ->with('status', 'danger');
		}
    }

    public function changePhoto(Request $request){
    	$file = $request->uploadFile;
    	$filename = $file->getClientOriginalName();
    	$ext = $file->getClientOriginalExtension();
    	$filename = Auth::user()->id.'_'.Auth::user()->name.'.'.$ext;
    	$user = DB::table('users')
            ->where('id', Auth::user()->id);
       try{
        	unlink(public_path('picture/'.$user->value('logo')));
        } finally{
	    	DB::table('users')
		        ->where('id', Auth::user()->id)
		        ->update([
		          'logo' => $filename
		          ]);
		    Storage::disk('public_uploads') -> put($filename, file_get_contents($file -> getRealPath()));
		}
	    
    }
}
