<?php

namespace App\Exports;

use App\Absen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanRombelSiswa implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Siswa::all();
        
    // }

    function __construct($range, $rombel)
    {
        $this->range = $range;
        $this->rombel = $rombel;
    }

    public function view() : View
    {
        return view('report.xl.laporan_rombel_siswa', [
            'range' => $this->range,
            'rombel' => $this->rombel
        ]);
    }
}
