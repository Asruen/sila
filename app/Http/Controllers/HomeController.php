<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function index(){
        $header = "Dashboard";
        return view('Home',compact('header'));
    }

    public function indexd(){
        $header = "Dashboard Ybb";
        
        return view('Template.dashboard_ybb', compact('header'));
    }

    public function downloadPDF()
    {
        $pdf = Pdf::loadView('template.mou');

        return $pdf->download('MoU_SPPG_&_Sekolah.pdf');
    }

    public function PDF()
    {
        $pdf = Pdf::loadView('template.pks');

        return $pdf->download('PKS_SUPPLAYER_2025.pdf');
    }

    public function PDFs()
    {
        $pdf = Pdf::loadView('template.surat');

        return $pdf->download('Surat_Perjanjian_Kerjasama.pdf');
    }

    public function PDFsm()
    {
        $pdf = Pdf::loadView('template.spesifikasi');

        return $pdf->download('Spesifikasi_Bahan_Makanan.pdf');
    }

    public function PDFl()
    {
        $pdf = Pdf::loadView('template.lembar');

        return $pdf->download('Lembar_stok_opname_FIFO.pdf');
    }

    public function PDFb()
    {
        $pdf = Pdf::loadView('template.barang');

        return $pdf->download('Barang_Datang_Bahan_Baku1.pdf');
    }

    public function PDFb2()
    {
        $pdf = Pdf::loadView('template.barang2');

        return $pdf->download('Barang_Datang_Bahan_Baku2.pdf');
    }

    public function PDFc()
    {
        $pdf = Pdf::loadView('template.chiller');

        return $pdf->download('Temperatur_Chiller.pdf');
    }

    public function PDFr()
    {
        $pdf = Pdf::loadView('template.ruangan');

        return $pdf->download('Temperatur_dan_Kelembapan_Ruangan_ATOS.pdf');
    }

    public function PDFf()
    {
        $pdf = Pdf::loadView('template.freezer');

        return $pdf->download('Temperatur_Freezer.pdf');
    }
}
