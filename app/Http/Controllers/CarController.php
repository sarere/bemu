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
      require_once '../vendor/autoload.php';
      $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/P3DK.docx');
      $templateProcessor->setValue('programKerja', $request->isi);
      $templateProcessor->setValue('namaOrganisasiKemahasiswaan', 'KINE KLUB');
      $templateProcessor->setValue('tempatSekretariat', 'Gedung Filia Lt.2');
      $templateProcessor->setValue('email', 'kineklub@students.ukdw.ac.id');
      $templateProcessor->setValue('website', '-');
      $templateProcessor->setValue('nama', 'Utha');
      $templateProcessor->setValue('nomorKontak', '08123456789');
      $templateProcessor->setValue('nominal', '1.500.000');
      $templateProcessor->setValue('terbilang', 'satu juta lima ratus ribu rupiah');
      $templateProcessor->setValue('nimKetuaProker', 'Rere');
      $templateProcessor->setValue('nimSekreProker', 'Rere');
      $templateProcessor->setValue('nimKetuaOK', 'Rere');
      $templateProcessor->setValue('ketuaProker', 'Rere');
      $templateProcessor->setValue('sekreProker', 'Rere');
      $templateProcessor->setValue('ketuaOK', 'Rere');
      $templateProcessor->setValue('ketuaOK', 'Rere');
      $templateProcessor->setValue('wakilDekan', 'Rere');
      $templateProcessor->setValue('tema', 'Rere');
    }

	public function show($id)
    {
      $car = Car::find($id);
      return view('show', array('car' => $car));
    }
    //
}
