<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class PiketKurikulumController extends Controller
{
    public function beranda()
    {
        return view('piket_kurikulum.beranda');
    }

    public function pesan()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('piket_kurikulum.pesan', compact('users'));
    }
}
