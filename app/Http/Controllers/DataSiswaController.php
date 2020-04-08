<?php

namespace App\Http\Controllers;

use App\Exports\DownloadTemplateSiswa;
use App\Imports\DataSiswaImport;
use App\Rayon;
use App\Rombel;
use App\Siswa;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DataSiswaController extends Controller
{
    public function daftar_siswa(Request $request)
    {
        $q = $request->q;
        $siswas = Siswa::join('rombels', 'siswas.rombel_id', '=', 'rombels.id')
                        ->join('rayons', 'siswas.rayon_id', '=', 'rayons.id')
                        ->orWhere('siswas.nama', 'LIKE', '%'.$q.'%')
                        ->orWhere('siswas.nis', 'LIKE', '%'.$q.'%')
                        ->orWhere('siswas.jenis_kelamin', 'LIKE', '%'.$q.'%')
                        ->orWhere('rayons.rayon', 'LIKE', '%'.$q.'%')
                        ->orWhere('rombels.rombel', 'LIKE', '%'.$q.'%')
                        ->select('siswas.id as id', 'siswas.nis as nis', 'siswas.jenis_kelamin as jenis_kelamin', 'siswas.nama as nama', 'rombels.rombel as rombel', 'rayons.rayon as rayon')
                        ->paginate(10)->appends(['q' => $q]);
        return view('data.siswa.daftar_siswa', compact('siswas'));
    }

    public function tambah_siswa()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('data.siswa.tambah_siswa', compact('rombels', 'rayons'));
    }

    public function simpan_siswa(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'rombel' => 'required',
            'rayon' => 'required'
        ]);

        $ot = null;
        if ($request->orangtua == "true") {
            $ot = User::create([
                'nama' => $request->nis,
                'username' => $request->nis,
                'password' => Hash::make($request->nis),
            ]);

            $ot->roles()->attach('4');

            $ot = $ot->id;
        }

        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rombel_id' => $request->rombel,
            'rayon_id' => $request->rayon,
            'orangtua_id' => $ot
        ]);


        return redirect()->route(get_link_role().'data.siswa.detail_siswa', $siswa->id)->with('Berhasil Menambahkan Siswa!');
    }
    
    public function detail_siswa($siswa)
    {
        $siswa = Siswa::find($siswa);
        return view('data.siswa.detail_siswa', compact('siswa'));
    }

    public function edit_siswa($siswa)
    {
        $siswa = Siswa::find($siswa);
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('data.siswa.edit_siswa', compact('siswa', 'rombels', 'rayons'));
    }

    public function update_siswa($siswa, Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $request->nis . ',nis',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'rombel' => 'required',
            'rayon' => 'required'
        ]);

        
        $siswa = Siswa::find($siswa);
        
        $ot = $siswa->orangtua_id ?? null;

        if ($request->orangtua == "true") {
            if ($ot == null) {

                if (User::where('username', $siswa->nis)->count() > 0) {
                    $ot = User::where('username', $siswa->nis)->first();
                } else{
                    $ot = User::create([
                        'nama' => $siswa->nis,
                        'username' => $siswa->nis,
                        'password' => Hash::make($siswa->nis),
                    ]);
                }

                $ot->roles()->attach(4);

                $siswa->update(['orangtua_id' => $ot->id]);
            }
        } else{
            if ($ot != null) {
                $siswa->update(['orangtua_id' => null]);
                $user = User::find($ot);
                $user->roles()->detach(4);
            }
        }

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rombel_id' => $request->rombel,
            'rayon_id' => $request->rayon,
        ]);


        return redirect()->route(get_link_role().'data.siswa.detail_siswa', $siswa->id)->with('status', 'Siswa berhasil diupdate');
    }

    public function delete_siswa($siswa)
    {
        $siswa = Siswa::find($siswa)->delete();
    }

    public function download_pdf_siswa($siswa)
    {
        $siswa = Siswa::find($siswa);
        $pdf = PDF::loadView('data.siswa.download_data_siswa_pdf', ['siswa' => $siswa]);
        return $pdf->stream();
    }

    public function download_template()
    {
        return (new DownloadTemplateSiswa())->download('Template Unggah Siswa.xlsx');
    }

    public function unggah_data_siswa_xl(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $name = rand() . '.' . $file->getClientOriginalExtension();

        $file->move('import', $name);

        Excel::import(new DataSiswaImport(), public_path('/import/' . $name));

        $request->session()->flash('success', 'Berhasil Import Siswa!');

        return redirect()->back();
    }

    public function aktifkan_akun_orangtua()
    {
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
        
            $ot = $siswa->orangtua_id ?? null;
    
            if ($ot == null) {

                if (User::where('username', $siswa->nis)->count() > 0) {
                    $ot = User::where('username', $siswa->nis)->first();
                } else{
                    $ot = User::create([
                        'nama' => $siswa->nis,
                        'username' => $siswa->nis,
                        'password' => Hash::make($siswa->nis),
                    ]);
                }
    
                $ot->roles()->attach(4);
    
                $siswa->update(['orangtua_id' => $ot->id]);
            }
        }
        
        return redirect()->back()->with('status', 'Akun orangtua berhasil diaktifkan semua!');
    }

    public function nonaktifkan_akun_orangtua()
    {
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
        
            $ot = $siswa->orangtua_id ?? null;
    
            if ($ot != null) {
                $siswa->update(['orangtua_id' => null]);
                $user = User::find($ot);
                $user->roles()->detach(4);
            }
        }
        
        return redirect()->back()->with('status', 'Akun orangtua berhasil dinonaktifkan semua!');
    }
}
