<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexUpload(){
        return view('upload');
    }

    public function indexStatus(){
        return view('status');
    }

    public function uploadStorage(Request $request){
    	$file = $request->uploadFile;
    	$filename = $file->getClientOriginalName();;

    	Storage::disk('proposal') -> put($filename, file_get_contents($file -> getRealPath()));
    }
}
