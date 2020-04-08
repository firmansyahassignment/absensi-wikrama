<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSiswa;
use App\Siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanSiswaController extends Controller
{
    public function laporan_siswa($siswa)
    {
        $siswa = Siswa::findOrFail($siswa);
        return view('laporan_siswa.laporan_siswa', compact('siswa'));
    }
    
    public function laporan_daftar_siswa()
    {
        $siswas = Siswa::all();
        return view('laporan_siswa.laporan_daftar_siswa', compact('siswas'));
    }

    public function laporan_siswa_xl_download(Siswa $siswa){
        $range = tanggal_range_db();
        return (new LaporanSiswa($range, $siswa))->download($siswa->nis . '_' . $siswa->nama . '_laporan_siswa.xlsx');
    }

    public function laporan_siswa_pdf_download(Siswa $siswa){
        $range = tanggal_range_db();
        $pdf = PDF::loadView('report.pdf.laporan_siswa', ['siswa' => $siswa, 'range' => $range]);
        return $pdf->stream();
    }
}
