<?php

namespace App\Exports;

use App\Absen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class DownloadDataRombelSiswa implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Siswa::all();
        
    // }

    function __construct($rombel)
    {
        $this->rombel = $rombel;
    }

    public function view() : View
    {
        return view('data.rombel.data_rombel_siswa_xl', [
            'rombel' => $this->rombel
        ]);
    }
}
