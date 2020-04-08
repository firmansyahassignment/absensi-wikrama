<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Exports\LaporanRombelSiswa;
use App\Rombel;
use App\Exports\LaporanSiswa;
use App\Siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanRombelController extends Controller
{
    public function laporan_daftar_rombel()
    {
        $rombels = Rombel::all();
        return view('laporan_rombel.laporan_daftar_rombel', compact('rombels'));
    }

    public function laporan_rombel($rombel)
    {
        $rombel = Rombel::findOrFail($rombel);
        $absens = Absen::all();
        return view('laporan_rombel.laporan_rombel', compact('rombel', 'absens'));
    }

    public function laporan_rombel_siswa_xl_download(Rombel $rombel)
    {
        $range = tanggal_range_db();
        return (new LaporanRombelSiswa($range, $rombel))->download('laporan_rombel_siswa.xlsx');
    }

    public function laporan_rombel_siswa_pdf_download(Rombel $rombel)
    {
        $range = tanggal_range_db();
        $pdf = PDF::loadView('report.pdf.laporan_rombel_siswa', ['rombel' => $rombel, 'range' => $range]);
        return $pdf->stream();
    }
}
