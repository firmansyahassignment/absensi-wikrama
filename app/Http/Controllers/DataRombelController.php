<?php

namespace App\Http\Controllers;

use App\Exports\DownloadDataRombelSiswa;
use App\Exports\DownloadTemplateRombelSiswa;
use App\Imports\SiswaImport;
use App\Jurusan;
use App\Rombel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataRombelController extends Controller
{
    public function index()
    {
        $rombels = Rombel::all();
        $jurusans = Jurusan::all();
        return view('data.rombel.index', compact('rombels', 'jurusans'));
    }

    public function tambah(Request $request)
    {

        $short_jurusan = Jurusan::find($request->jurusan)->short;
        switch ($request->angkatan) {
            case '10':
                $romawi = 'X';
                break;
            case '11':
                $romawi = 'XI';
                break;
            case '12':
                $romawi = 'XII';
                break;
        }

        $newRombel =  $short_jurusan . ' ' . $romawi . '-' . $request->rombel_ke;
        $kelas = $romawi . '-' . $request->rombel_ke;

        if (Rombel::where('rombel', $newRombel)->count() > 0) {
            return redirect()->back()->with('error', 'Rombel sudah ada sebelumnya');
        }

        Rombel::create([
            'rombel' => $newRombel,
            'angkatan' => $request->angkatan,
            'kelas' => $kelas,
            'jurusan_id' => $request->jurusan,
        ]);
        
        return redirect()->back()->with('status', 'Berhasil menambah rombel!');
    }

    public function detail($rombel)
    {
        $rombel = Rombel::find($rombel);
        $jurusans = Jurusan::all();
        return view('data.rombel.detail', compact('rombel', 'jurusans'));
    }

    public function download_template()
    {
        return (new DownloadTemplateRombelSiswa())->download('template_import_siswa_rombel.xlsx');
    }

    public function import_siswa($rombel, Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $name = rand() . '.' . $file->getClientOriginalExtension();

        $file->move('import', $name);

        Excel::import(new SiswaImport($rombel), public_path('/import/' . $name));

        $request->session()->flash('status', 'Berhasil Import Siswa!');

        return redirect()->back();
    }

    public function rombel_ubah($rombel, Request $request)
    {
        $rombel = Rombel::find($rombel);
        $short_jurusan = Jurusan::find($request->jurusan)->short;
        switch ($request->angkatan) {
            case '10':
                $romawi = 'X';
                break;
            case '11':
                $romawi = 'XI';
                break;
            case '12':
                $romawi = 'XII';
                break;
        }

        $newRombel =  $short_jurusan . ' ' . $romawi . '-' . $request->rombel_ke;
        $kelas = $romawi . '-' . $request->rombel_ke;

        $rombel->update([
            'rombel' => $newRombel,
            'angkatan' => $request->angkatan,
            'kelas' => $kelas,
            'jurusan_id' => $request->jurusan,
        ]);
        
        return redirect()->back()->with('status', 'Berhasil mengubah data!');
    }

    public function download_xl_siswa($rombel)
    {
        $rombel = Rombel::find($rombel);
        return (new DownloadDataRombelSiswa($rombel))->download('Daftar Siswa ' . $rombel->rombel . '.xlsx');
    }

    public function download_pdf_siswa($rombel)
    {
        $rombel = Rombel::find($rombel);
        $pdf = PDF::loadView('data.rombel.data_rombel_siswa_pdf', ['rombel' => $rombel]);
        return $pdf->stream();
    }
}
