<?php

namespace App\Http\Controllers;

use App\JenisKesalahan;
use App\LaporkanKesalahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporkanKesalahanController extends Controller
{
    public function laporkan_kesalahan()
    {
        $jenis_kesalahans = JenisKesalahan::all();
        return view('laporkan_kesalahan.laporkan_kesalahan', compact('jenis_kesalahans'));
    }

    public function simpan_laporkan_kesalahan(Request $request)
    {
        $request->validate([
            'jenis_kesalahan' => 'required',
            'device_yang_digunakan' => 'in:smartphone,laptop',
            'deskripsi' => 'required',
            'tangkapan_layar' => 'mimes:jpeg,jpg,png|max:20000'
        ]);
        
        $file = null;
        if ($request->file('tangkapan_layar')) {
            $file = $request->file('tangkapan_layar')->store('uploads');
        }

        LaporkanKesalahan::create([
            'jenis_kesalahan_id' => $request->jenis_kesalahan,
            'device_digunakan' => $request->device_yang_digunakan,
            'deskripsi' => $request->deskripsi,
            'tangkapan_layar' => $file,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('status', 'Terimakasih telah melaporkan kesalahan kepada kami, kami akan memperbaikinya dengan segera.');

    }
}
