<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrangtuaController extends Controller
{
    public function beranda()
    {
        $orangtua = User::find(Auth::user()->id);
        $siswa = Siswa::where('orangtua_id', $orangtua->id)->first();
        $hari_ini = Absen::where('siswa_id', $siswa->id)->where('tanggal_absen', date('Y-m-d'))->first();
        $masuk = Absen::where('siswa_id', $siswa->id)->where('keterangan', 'masuk')->count();
        $sakit = Absen::where('siswa_id', $siswa->id)->where('keterangan', 'sakit')->count();
        $izin = Absen::where('siswa_id', $siswa->id)->where('keterangan', 'izin')->count();
        $alfa = Absen::where('siswa_id', $siswa->id)->where('keterangan', 'alfa')->count();
        return view('orangtua.beranda', compact('orangtua', 'siswa', 'hari_ini', 'masuk', 'sakit', 'izin', 'alfa'));
    }   
}
