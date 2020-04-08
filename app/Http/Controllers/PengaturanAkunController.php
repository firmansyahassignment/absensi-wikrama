<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanAkunController extends Controller
{
    public function pengaturan_akun()
    {
        $user = Auth::user();
        return view('pengaturan_akun.pengaturan_akun', compact('user'));
    }

    public function simpan_pengaturan_akun(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'string',
            'email' => 'email'
        ]);

        $user = User::find(Auth::user()->id);
        $user->update([
            'nama' => $request->nama,
            'phone' => $request->no_telepon,
            'email' => $request->email
        ]);

        return redirect()->back()->with('status', 'Data anda berhasil diubah!');
    }

    public function ubah_autentikasi()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('pengaturan_akun.ubah_autentikasi', compact('user'));
    }

    public function simpan_ubah_autentikasi(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username,'. $request->username.',username',
            'password' => 'required|confirmed|min:8|string',
        ]);

        Auth::user()->update([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('status', 'Berhasil mengubah autentikasi! Silahkan nanti login dengan data yang baru!');
    }
}
