<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexUpload(){
        return view('p3dk.upload');
    }

    public function indexStatus(){
        $proposals = DB::table('proposals')->orderBy('tracking', 'desc')->paginate(20);
        $emails = DB::table('users')
                            ->select('email')
                            ->get();
        return view('p3dk.status', ['proposals' => $proposals, 'emails' => $emails]);
    }

    public function indexPendahuluan(){
        return view('p3dk.phpword');
    }

     public function downloadTemplate(Request $request)
    {
      $proker = strtoupper($request->proker);
      if($request->skipped === 'true'){
        if($request->danaFakultas === 'Ya'){
          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/P3DK - Kop Surat - Dana Fak.docx');
          $templateProcessor->setValue('wakilDekan', $request->wakilDekan);
        } else{
          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/P3DK - Kop Surat - Non Dana Fak.docx');
        }
      } else {
        if($request->danaFakultas === 'Ya'){
          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/P3DK - Non Kop Surat - Dana Fak.docx');
          $templateProcessor->setValue('wakilDekan', $request->wakilDekan);
        } else{
          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/P3DK - Non Kop Surat - Non Dana Fak.docx');
        }
        $templateProcessor->setValue('namaOrganisasiKemahasiswaan', $request->organisasiKemahasiswaan);
        $templateProcessor->setValue('tempatSekretariat', $request->kesekretariatan);
        $templateProcessor->setValue('email', $request->email);
        $templateProcessor->setValue('alamat', $request->alamatMedsos);
        $templateProcessor->setValue('medsos', $request->medsos);
      }
    
      $templateProcessor->setValue('programKerja', $proker);      
      $templateProcessor->setValue('nama', $request->namaKontak);
      $templateProcessor->setValue('nomorKontak', $request->nomorKontak);
      $templateProcessor->setValue('nominal', $request->skDanaJumlah);
      $templateProcessor->setValue('terbilang', $request->skDanaTerbilang);
      $templateProcessor->setValue('nimKetuaProker', $request->nimKetuaProker);
      $templateProcessor->setValue('nimSekreProker', $request->nimSekreProker);
      $templateProcessor->setValue('nimKetuaOK', $request->nimKetuaOK);
      $templateProcessor->setValue('ketuaProker', $request->namaKetuaProker);
      $templateProcessor->setValue('sekreProker', $request->namaSekreProker);
      $templateProcessor->setValue('ketuaOK', $request->namaKetuaOK);
      $templateProcessor->setValue('tema', $request->temaAcara);

      $templateProcessor->saveAs('P3DK - '.$proker.'.docx');

      $newDoc = 'P3DK - '.$proker.'.docx';

      /* Add our HTTP Headers */
      // http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
      // http://www.w3.org/Protocols/rfc2616/rfc2616-sec19.html

      // Doc generated on the fly, may change so do not cache it; mark as public or
      // private to be cached.
      header('Pragma: no-cache');
      // Mark file as already expired for cache; mark with RFC 1123 Date Format up to
      // 1 year ahead for caching (ex. Thu, 01 Dec 1994 16:00:00 GMT)
      header('Expires: 0');
      // Forces cache to re-validate with server
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      // DocX Content Type
      header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      // Tells browser we are sending file
      header('Content-Disposition: attachment; filename=P3DK - '.$proker.'.docx');
      // Tell proxies and gateways method of file transfer
      header('Content-Transfer-Encoding: binary');
      // Indicates the size to receiving browser
      header('Content-Length: '.filesize($newDoc));

      // Send the file:
      readfile($newDoc);

      // Delete the file if you so choose. BE CAREFULE; YOU MAY NEED TO DO THIS
      // THROUGH YOUR FRAMEWORK:
      unlink($newDoc);

      // End the session. BE CAREFUL; YOU NEED TO DO THIS THROUGH YOUR FRAMEWORK:
      session_write_close();
    }

    public function uploadRevision(Request $request){
      $proposal = DB::table('proposals')->where('id', $request->id);
      $timestamp=Carbon::now()->toDateTimeString();

      $file = $request->uploadFile;
      $filename = $proposal->value('nama_proposal');
      Storage::disk('proposal') -> put($filename, file_get_contents($file -> getRealPath()));

      $now = Carbon::now();
      $revision = $proposal->value('revision') + 1;

      DB::table('proposals')
            ->where('id', $request->id)
            ->update([
              'waktu_masuk' => $now,
              'jalur' => 'online',
              'status' => 'BELUM DIPERIKSA',
              'download_link' => '-',
              'tracking' => $timestamp,
              'revision' => $revision
              ]);
    }

    public function uploadStorage(Request $request){
    	$file = $request->uploadFile;
        $filename = $file->getClientOriginalName();
        $timestamp=Carbon::now()->toDateTimeString();
        $now = Carbon::now();

        Storage::disk('proposal') -> put($filename, file_get_contents($file -> getRealPath()));
        $user = Auth::user();

        DB::table('proposals')->insert([            
            'nama_proposal' => $filename,
            'jalur' => 'online',
            'waktu_masuk' => $now,            
            'status' => 'BELUM DIPERIKSA',
            'download_link' => '-',
            'pemeriksa' => '-',
            'revision' => 0,
            'tracking' => $timestamp,
            'email' => $user->email
            ]);
    }

    public function download(Request $request){
        $proposal = $request->proposal;
        $timestamp=Carbon::now()->toDateTimeString();
        DB::table('proposals')
            ->where('id', $request->id)
            ->update([
              'status' => 'PROSES',
              'tracking' => $timestamp
              ]);
        return response()->download(storage_path("app/proposal/$proposal"));
    }

    public function detailStatus(Request $request){
        $proposal = DB::table('proposals')
                            ->where('id', $request->id)
                            ->get();
        return $proposal;
    //     return response()->json(['proposal' => $proposal,
    // 'state' => 'CA'],200);
    }

    public function statusUpdate(Request $request){
        $now = Carbon::now();
        $filename = $request->nama_proposal;
        $file = $request->uploadGuideFile;
        $filename = $request->nama_proposal;
        $timestamp=Carbon::now()->toDateTimeString();
        
        
        $now = new DateTime();

        if($file){
          Storage::disk('proposal') -> put($filename, file_get_contents($file -> getRealPath()));
        }
        

        DB::table('proposals')
            ->where('id', $request->id)
            ->update([
              'nama_proposal' => $filename,
              'waktu_pengecekan' => $now,
              'pemeriksa' => $request->pemeriksa,
              'status' => $request->status,
              'tracking' => $timestamp
              ]);
        return redirect('status');
    }

    public function statusTambah(Request $request){
      $now = Carbon::now();
      $timestamp=Carbon::now()->toDateTimeString();

      $pemeriksa = '-';
      if($request->pemeriksa){
        $pemeriksa = $request->pemeriksa;
      };

      DB::table('proposals')->insert([            
        'nama_proposal' => $request->nama_proposal,
        'jalur' => 'offline',
        'waktu_masuk' => $now,            
        'status' => $request->status,
        'download_link' => '-',
        'pemeriksa' => $pemeriksa,
        'revision' => 0,
        'tracking' => $timestamp,
        'email' => $request->email
        ]);
      return redirect('status');
    }
    
    function delete(Request $request){
      $proposal = DB::table('proposals')->where('id', $request->id);
      $filename = $proposal->value('nama_proposal');
      try{
        unlink(storage_path('app/proposal/'.$filename));
      } finally{
        DB::table('proposals')->where('id', $request->id)->delete();
        return redirect('status');
      }
    }
}
