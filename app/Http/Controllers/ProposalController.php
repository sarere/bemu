<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    public function indexUpload(){
    	return view('upload');
    }

    public function indexStatus(){
    	return view('status');
    }

    public function uploadStorage(Request $request){
    	$file = $request->fileUpload;

    	$filename = 'P3DK.docx';

    	Storage::disk('proposal') -> put($filename, file_get_contents($file -> getRealPath()));
    }
}
