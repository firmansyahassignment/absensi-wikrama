<?php

namespace App\Exports;

use App\Absen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanSiswa implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Siswa::all();
        
    // }

    function __construct($range, $siswa)
    {
        $this->range = $range;
        $this->siswa = $siswa;
    }

    public function view() : View
    {
        return view('report.xl.laporan_siswa', [
            'range' => $this->range,
            'siswa' => $this->siswa
        ]);
    }
}
