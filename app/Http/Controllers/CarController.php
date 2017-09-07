<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\HTMLtoOpenXML;

class CarController extends Controller
{
	public function index()
    {
      if(session()->has('my_name')){
        return view('phpword');
      } else{
        return redirect('login');
      }
    }

    public function store(Request $request)
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
      //unlink($newDoc);

      // End the session. BE CAREFUL; YOU NEED TO DO THIS THROUGH YOUR FRAMEWORK:
      session_write_close();
    }

	public function show($id)
    {
      $car = Car::find($id);
      return view('show', array('car' => $car));
    }
    //
}
