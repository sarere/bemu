<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\HTMLtoOpenXML;

class CarController extends Controller
{
	public function index()
    {
      // require_once '../vendor/autoload.php';
      // $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/P3DK.docx');
      // $templateProcessor->setValue('programKerja', 'DUTA WACANA PROJECT');
      // $templateProcessor->setValue('namaOrganisasiKemahasiswaan', 'KINE KLUB');
      // $templateProcessor->setValue('tempatSekretariat', 'Gedung Filia Lt.2');
      // $templateProcessor->setValue('email', 'kineklub@students.ukdw.ac.id');
      // $templateProcessor->setValue('website', '-');
      // $templateProcessor->setValue('nama', 'Utha');
      // $templateProcessor->setValue('nomorKontak', '08123456789');
      // $templateProcessor->setValue('nominal', '1.500.000');
      // $templateProcessor->setValue('terbilang', 'satu juta lima ratus ribu rupiah');
      // $templateProcessor->setValue('nimKetuaProker', 'Rere');
      // $templateProcessor->setValue('nimSekreProker', 'Rere');
      // $templateProcessor->setValue('nimKetuaOK', 'Rere');
      // $templateProcessor->setValue('ketuaProker', 'Rere');
      // $templateProcessor->setValue('sekreProker', 'Rere');
      // $templateProcessor->setValue('ketuaOK', 'Rere');
      // $templateProcessor->setValue('ketuaOK', 'Rere');
      // $templateProcessor->setValue('wakilDekan', 'Rere');
      // $templateProcessor->setValue('tema', 'Rere');
      
      
      // $templateProcessor->saveAs('P3DK.docx');
      $tes = 's';
      return view('phpword')->with('tes',$tes);
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
