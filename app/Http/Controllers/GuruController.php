<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSiswa;
use App\Siswa;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class GuruController extends Controller
{
    public function beranda()
    {
        return view('guru.beranda');
    }

    public function pesan()
    {

        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('guru.pesan', compact('users'));
    }
}
