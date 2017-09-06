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
      return view('welcome');
    }

	public function show($id)
    {
      $car = Car::find($id);
      return view('show', array('car' => $car));
    }
    //
}
