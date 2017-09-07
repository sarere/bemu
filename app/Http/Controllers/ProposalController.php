<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProposalController extends Controller
{
    public function indexUpload(){
    if(session()->has('my_name')){
        return view('upload');
      } else{
        return redirect('login');
      }
    	
    }

    public function indexStatus(){
        if(session()->has('my_name')){
        return view('status');
      } else{
        return redirect('login');
      }
    	
    }

    public function uploadStorage(Request $request){
        // $file = $request->input('firstname');

    	$file = $request->uploadFile;
    	$filename = $file->getClientOriginalName();;

    	Storage::disk('proposal') -> put($filename, file_get_contents($file -> getRealPath()));
        // return redirect('/');
        // return Response::json('success', 200);
    }
}
