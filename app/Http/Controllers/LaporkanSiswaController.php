<?php

namespace App\Http\Controllers;

use App\Absen;
use App\LaporkanSiswa;
use App\LaporkanSiswaReaded;
use App\Rayon;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporkanSiswaController extends Controller
{
    public function laporkan_siswa_api(Request $request)
    {
        $siswa = Siswa::find($request->id);
        $id_user = Auth::user()->id;
        $cek = LaporkanSiswa::where('siswa_id', $siswa->id)->where('tanggal_absen', $request->tanggal)->count() ?? 0;

        if ($cek < 1) {
            $data = LaporkanSiswa::create([
                'siswa_id' => $siswa->id,
                'user_id' => $id_user,
                'tanggal_absen' => $request->tanggal,
                'rayon_id' => $siswa->rayon->id
            ]);
            return response()->json($data, 200);
        }

        return response()->json(false, 200);
    }

    public function daftar_siswa_dilaporkan()
    {
        $laporkan_readed = LaporkanSiswaReaded::all();
        $laporkan_readed_id = [];
        foreach ($laporkan_readed as $a) {
            $laporkan_readed_id[] = $a->laporkan_siswa_id;
        }

        $laporkans = LaporkanSiswa::whereNotIn('id', $laporkan_readed_id)->get();

        if (Auth::user()->role == 3) {
            $kRayons = [];
            foreach (Auth::user()->rayons as $a) {
                $kRayons[] = $a->id;
            }
            $laporkans = $laporkans->whereIn('rayon_id', $kRayons);
        }

        return view('laporkan_siswa.daftar_siswa_dilaporkan', compact('laporkans'));
    }

    public function data_absen_siswa_api(Request $request)
    {
        $siswa_id = $request->id;
        $tanggal = $request->tanggal;

        $absen = Absen::where('siswa_id', $siswa_id)
                        ->where('tanggal_absen', $tanggal)
                        ->first();
        
        $data['keterangan'] = $absen->keterangan ?? '';
        $data['diabsen_oleh'] = $absen->user->nama ?? '';


        return response()->json($data, 200);

    }

    public function absen_siswa_api(Request $request)
    {
        $absen = Absen::where('siswa_id', $request->id)
                        ->where('tanggal_absen', $request->tanggal)->get();
        $user_id = Auth::user()->id;
        if ($absen->count() > 0) {
            $absen = $absen->first();
            $absen->update([
                'keterangan' => $request->keterangan,
                'user_id' => $user_id
            ]);
        } else{
            $siswa = Siswa::find($request->id);
            $rombel = $siswa->rombel_id;
            $rayon = $siswa->rayon_id;
            $keterangan = $request->keterangan;
            $tanggal_absen = $request->tanggal;

            $absen = Absen::create([
                'siswa_id' => $siswa->id,
                'rombel_id' => $rombel,
                'rayon_id' => $rayon,
                'keterangan' => $keterangan,
                'tanggal_absen' => $tanggal_absen,
                'user_id' => $user_id
            ]);
        }

        $readedBy = LaporkanSiswaReaded::create([
            'user_id' => Auth::user()->id,
            'laporkan_siswa_id' => $request->laporkan_id
        ]);

        return response()->json($absen, 200);
    }

}
