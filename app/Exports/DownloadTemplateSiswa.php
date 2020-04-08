<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class DownloadTemplateSiswa implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view() : View
    {
        return view('template_xl.data_siswa');
    }
}
