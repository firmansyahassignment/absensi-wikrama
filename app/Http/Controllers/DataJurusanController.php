<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;

class DataJurusanController extends Controller
{
    public function daftar_jurusan()
    {
        $q = request()->q;
        $jurusans = Jurusan::where('jurusan', 'LIKE', '%'.$q.'%')
                            ->where('short', 'LIKE', '%'.$q.'%')
                            ->get();
                            
        return view('data.jurusan.daftar_jurusan', compact('jurusans'));
    }

    public function detail_jurusan($jurusan)
    {
        $jurusan = Jurusan::findOrFail($jurusan);
        return view('data.jurusan.detail_jurusan', compact('jurusan'));
    }

    public function tambah_jurusan()
    {
        return view('data.jurusan.tambah_jurusan');
    }

    public function simpan_jurusan(Request $request)
    {
        $request->validate([
            'jurusan' => 'required',
            'singkatan' => 'required'
        ]);

        $jurusan = Jurusan::create([
            'jurusan' => $request->jurusan,
            'short' => strtoupper($request->singkatan)
        ]);

        return redirect()->route(get_link_role().'data.jurusan.daftar_jurusan')->with('status', 'Berhasil tambah jurusan');
    }

    public function edit_jurusan($jurusan)
    {
        $jurusan = Jurusan::findOrFail($jurusan);
        return view('data.jurusan.edit_jurusan', compact('jurusan'));
    }

    public function update_jurusan($jurusan, Request $request)
    {
        $request->validate([
            'jurusan' => 'required',
            'singkatan' => 'required'
        ]);

        $jurusan = Jurusan::findOrFail($jurusan);


        $jurusan->update([
            'jurusan' => $request->jurusan,
            'short' => $request->singkatan
        ]);

        return redirect()->route(get_link_role().'data.jurusan.detail_jurusan', $jurusan->id)->with('status', 'Berhasil mengubah data!');
    }

    public function delete_jurusan($jurusan)
    {
        $jurusan = Jurusan::findOrFail($jurusan)->delete();

        return redirect()->route(get_link_role().'data.jurusan.daftar_jurusan')->with('status', 'Berhasil mengahapus jurusan!');
    }
}
